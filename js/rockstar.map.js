/*
	Rockstar Map 1.0
	Author: Nikolay Dyankov
	Site: http://www.nikolaydyankov.com
	Email: me@nikolaydyankov.com
*/

(function($) {
	var target, O;
	
	function isWithinElement(x, y, el) {
		if (x > el.offset().left && x < el.offset().left + el.width() &&
			y > el.offset().top && y < el.offset().top + el.height()) {
				return true;
			} else {
				return false
			}
	}
	
	function Wrapper() {
		this.el;
		this.css_width;
		this.css_height;
		this.width;
		this.height;
	}
	Wrapper.prototype.init = function() {
		this.el = target.el;
		this.css_width = (O.width == 'auto') ? '100%' : O.width;
		this.css_height = (O.height == 'auto') ? '100%' : O.height;
		this.css();
		this.width = this.el.width();
		this.height = this.el.height();
	}
	Wrapper.prototype.css = function() {
		var base = this;
		base.el.css({
			"width" : base.css_width,
			"height" : base.css_height,
			"overflow" : 'hidden',
			"position" : 'relative'
		});
	}
	Wrapper.prototype.refresh = function() {
		this.width = this.el.width();
		this.height = this.el.height();
		
		target.container.mox = (O.image.width*target.container.z - this.width)*(-1);
		target.container.moy = (O.image.height*target.container.z - this.height)*(-1);
		
		if (typeof window.innerWidth != 'undefined')
		{
		     target.fullscreen.viewportWidth = window.innerWidth;
		     target.fullscreen.viewportHeight = window.innerHeight;
		}
	}
	
	function Container() {
		this.el;
		this.ox;
		this.oy;
		this.oox;
		this.ooy;
		this.mox;
		this.moy;
		this.z;
		this.mz;
		this.w;
		this.h;
		this.cw;
		this.ch;
	}
	Container.prototype.init = function() {
		this.ox = 0;
		this.oy = 0;
		this.oox = 0;
		this.ooy = 0;
		
		this.mox = (O.image.width - target.wrapper.width)*(-1);
		this.moy = (O.image.height - target.wrapper.height)*(-1);
		
		// for zoom
		this.z = O.zoom.initial;
		this.mz = O.zoom.max;
		this.w = O.image.width;
		this.h = O.image.height;
		this.cw = this.w;
		this.ch = this.h;
		
		target.wrapper.el.wrapInner('<div class="ncl-container" />');
		this.el = target.wrapper.el.find('.ncl-container');
		
		target.container.css();
		target.container.center();
		target.container.get_focal_point();
		target.container.zoom_zoom_init();
	}
	Container.prototype.css = function() {
		this.el.css({
			"width" : O.image.width,
			"height" : O.image.height
		});
	},
	Container.prototype.drag_init = function(e) {
		this.el.stop();
		this.refresh();
		this.sx = e.pageX;
		this.sy = e.pageY;
		
		this.iox = this.ox;
		this.ioy = this.oy;
		
		this.left = target.container.ox;
		this.top = target.container.oy;
		
		// for intertia
		this.deltax = 0;
		this.deltay = 0;
		this.inertiaDuration = 2000;
	},
	Container.prototype.drag_drag = function(e) {
		this.ox = this.iox + e.pageX - this.sx;
		this.oy = this.ioy + e.pageY - this.sy;
		
		this.deltax = this.ox - this.left;
		this.deltay = this.oy - this.top;
		
		if (!target.fullscreen.is_fullscreen) {
			this.left = (this.ox < target.container.mox) ? target.container.mox : (this.ox > 0) ? 0 : this.ox;
			this.top = (this.oy < target.container.moy) ? target.container.moy : (this.oy > 0) ? 0 : this.oy;
		} else {
			this.left = this.ox;
			this.top = this.oy;
		}

		target.container.el.css({
			"left" : this.left,
			"top" : this.top,
		});
	},
	Container.prototype.drag_finish = function(e) {
		this.ox = this.el.position().left;
		this.oy = this.el.position().top;
		if (O.animations.inertia) {
			this.apply_inertia(this.get_focal_point, this.deltax, this.deltay);
		} else {
			this.get_focal_point();
		}
	}
	Container.prototype.zoom_zoom_init = function() {
		this.cw = this.w;
		this.ch = this.h;
	},
	Container.prototype.zoom_zoom_at = function(factor) {
		this.cw = this.w*factor;
		this.ch = this.h*factor;
		this.z = factor;
		
		this.el.css({
			"width" : this.cw,
			"height" : this.ch
		});
		
		this.zoom_refresh();
		target.locations.refresh();
	}
	Container.prototype.zoom_zoom_in = function() {
		var factor = (target.container.z + 1 > O.zoom.max) ? O.zoom.max : this.z + 1;
		this.cw = this.w*factor;
		this.ch = this.h*factor;
		this.z = factor;
		
		this.z = this.z;
		this.cw = this.cw;
		this.ch = this.ch;
		
		this.mox = (this.cw - target.wrapper.width)*(-1);
		this.moy = (this.ch - target.wrapper.height)*(-1);
		
		var l = -(this.focal_point.x - target.wrapper.width/2) - this.focal_point.x*(this.z - 1);
		var t = -(this.focal_point.y - target.wrapper.height/2) - this.focal_point.y*(this.z - 1);
		
		if (!target.fullscreen.is_fullscreen) {
			var left = (l < this.mox) ? this.mox : (l > 0) ? 0 : l;
			var top = (t < this.moy) ? this.moy : (t > 0) ? 0 : t;
		} else {
			var left = l;
			var top = t;
		}
		this.el.css({ "width" : this.cw, "height" : this.ch, "left" : left, "top" : top });
		target.locations.refresh();
		target.navigation.update();
	}
	Container.prototype.zoom_zoom_out = function() {
		var factor = (target.container.z - 1 < 1) ? 1 : target.container.z - 1;								
		this.cw = this.w*factor;
		this.ch = this.h*factor;
		this.z = factor;
		
		target.container.z = this.z;
		target.container.cw = this.cw;
		target.container.ch = this.ch;
		
		target.container.mox = (this.cw - target.wrapper.width)*(-1);
		target.container.moy = (this.ch - target.wrapper.height)*(-1);
		
		var l = -(target.container.focal_point.x - target.wrapper.width/2) - target.container.focal_point.x*(this.z - 1);
		var t = -(target.container.focal_point.y - target.wrapper.height/2) - target.container.focal_point.y*(this.z - 1);
		
		if (!target.fullscreen.is_fullscreen) {
			var left = (l < target.container.mox) ? target.container.mox : (l > 0) ? 0 : l;
			var top = (t < target.container.moy) ? target.container.moy : (t > 0) ? 0 : t;
		} else {
			var left = l;
			var top = t;
		}
		
		this.el.css({
			"width" : this.cw,
			"height" : this.ch,
			"left" : left,
			"top" : top
		});
		
		target.locations.refresh();
		target.navigation.update();
	},
	Container.prototype.zoom_refresh = function() {
		this.z = this.z;
		this.cw = this.cw;
		this.ch = this.ch;
		
		if (!target.fullscreen.is_fullscreen) {
			this.mox = (this.cw - target.wrapper.width)*(-1);
			this.moy = (this.ch - target.wrapper.height)*(-1);
		}
		
		var l = -(this.focal_point.x - target.wrapper.width/2) - this.focal_point.x*(this.z - 1);
		var t = -(this.focal_point.y - target.wrapper.height/2) - this.focal_point.y*(this.z - 1);
		
		if (!target.fullscreen.is_fullscreen) {
			var left = (l < this.mox) ? this.mox : (l > 0) ? 0 : l;
			var top = (t < this.moy) ? this.moy : (t > 0) ? 0 : t;
		} else {
			var left = l;
			var top = t;
		}
		
		this.el.css({
			"left" : left,
			"top" : top
		});
	}
	Container.prototype.move = function(direction) {
		if (direction == 'left') {
			this.go_at(this.focal_point.x*this.z - this.w/7, this.focal_point.y*this.z);
		}
		if (direction == 'right') {
			this.go_at(this.focal_point.x*this.z + this.w/7, this.focal_point.y*this.z);
		}
		if (direction == 'up') {
			this.go_at(this.focal_point.x*this.z, this.focal_point.y*this.z - this.h/7);
		}
		if (direction == 'down') {
			this.go_at(this.focal_point.x*this.z, this.focal_point.y*this.z + this.w/7);
		}
	}
	Container.prototype.apply_inertia = function(cb, dx, dy) {
		if (O.animations.inertia) {
			var m = 5, ox, oy;								
			this.interval;
			var root = this;
			if (this.interval != 1) {
				clearInterval(this.interval);
			}
			var nx, ny;
			var ox1 = root.ox, oy1 = root.oy;
			var fs = target.fullscreen.is_fullscreen;
			this.interval = setInterval(function() {
				if (!fs) {
					ox = (ox1 + (dx/10)*m < root.mox) ? root.mox : (ox1 + (dx/10)*m > 0) ? 0 : ox1 + (dx/10)*m;
					oy = (oy1 + (dy/10)*m < root.moy) ? root.moy : (oy1 + (dy/10)*m > 0) ? 0 : oy1 + (dy/10)*m;
				} else {
					ox = ox1 + (dx/10)*m;
					oy = oy1 + (dy/10)*m;
				}
				
				root.el.css({
					"left" : ox,
					"top" : oy
				});
				
				ox1 = ox;
				oy1 = oy;
				
				if (ox - root.ox == 0 && oy - root.oy == 0) {
					clearInterval(root.interval);
					root.interval = 1;
				}
				
				root.refresh();
				m = m/1.04;

				if (m <= 0.005) {
					clearInterval(root.interval);
					root.interval = 1;
				}
			}, 10);
		} else {
			cb();
		}							
	},
	Container.prototype.constrain = function() {
		this.ox = this.el.position().left;
		this.oy = this.el.position().top;
		
		this.left = (this.ox < this.mox) ? this.mox : (this.ox > 0) ? 0 : this.ox;
		this.top = (this.oy < this.moy) ? this.moy : (this.oy > 0) ? 0 : this.oy;
		
		this.el.css({
			"left" : this.left,
			"top" : this.top,
		});
	},
	Container.prototype.center = function() {
		this.left = (target.wrapper.width - O.image.width)/2;
		this.top = (target.wrapper.height - O.image.height)/2;
		
		this.ox = this.left;
		this.oy = this.top;
		
			this.el.css({
			"left" : this.left,
			"top" : this.top
		});
	},
	Container.prototype.go_at = function(x, y, no_animation) {
		var base = this;
		
		if (O.animations.inertia && this.interval != 1) { 
			clearInterval(this.interval); 
		}
		
		this.ox = (x - target.wrapper.width/2)*(-1);
		this.oy = (y - target.wrapper.height/2)*(-1);
		
		if (!target.fullscreen.is_fullscreen) {
			this.left = (this.ox < this.mox) ? this.mox : (this.ox > 0) ? 0 : this.ox;
			this.top = (this.oy < this.moy) ? this.moy : (this.oy > 0) ? 0 : this.oy;
		} else {
			this.left = this.ox;
			this.top = this.oy;
		}
		
		if (O.animations.move && !no_animation) {
			base.el.stop().animate({ 
				"left" : base.left, 
				"top" : base.top 
				}, {
					duration : 700,
					easing : 'easeOutCubic',
					step : function() {
						base.refresh();
					},
					complete : function() {
						base.refresh();
					}
				}
			);
		} else {
			base.el.css({ "left" : base.left, "top" : base.top });
			base.refresh();
		}							
	},
	Container.prototype.refresh = function() {
		this.ox = this.el.position().left;
		this.oy = this.el.position().top;
		this.get_focal_point();
	},
	Container.prototype.get_focal_point = function() {
		this.focal_point = {
			x : (target.wrapper.width/2 - this.ox)/this.z,
			y : (target.wrapper.height/2 - this.oy)/this.z
		}
	}
		
	function Locations() {
		this.ar;
		this.locs;
	}
	Locations.prototype.init = function() {
		this.ar = new Array();
		var dom_elements = target.wrapper.el.find('.location');
		
		var l=dom_elements.length;
		for (var i=0; i<l; i++) {
			this.ar[i] = {
				id : $(dom_elements[i]).attr('id'),
				x : $(dom_elements[i]).attr('data-x'),
				y : $(dom_elements[i]).attr('data-y'),
				title : $(dom_elements[i]).attr('data-title'),
				main_heading : $(dom_elements[i]).find('h1').html(),
				sub_heading : $(dom_elements[i]).find('h2').html(),
				address : $(dom_elements[i]).find('.address').html(),
				phone : $(dom_elements[i]).find('.phone').html(),
				content : $(dom_elements[i]).find('.content').html(),
			}
		}
		
		dom_elements.hide();
		target.locations.html();
		target.locations.css();
	}
	Locations.prototype.html = function() {
		var html;
		this.locs = new Array();
		var l = this.ar.length;
		for (var i=0; i<l; i++) {
			html = "<div class=\"ncl-location\" id="+this.ar[i].id+" style=\"left: "+this.ar[i].x+"px; top: "+this.ar[i].y+"px;\">\n";
			html += "\t<div class=\"ncl-location-pin\" data-id=\""+i+"\"></div>\n";
			html += "\t<div class=\"ncl-location-contents\">\n";
			html += "\t\t<div class=\"ncl-location-close\"></div>\n";
			if (this.ar[i].main_heading != null && this.ar[i].main_heading != undefined) { html += "\t\t<h1>"+this.ar[i].main_heading+"</h1>\n"; }
			if (this.ar[i].sub_heading != null && this.ar[i].sub_heading != undefined) { html += "\t\t<h2>"+this.ar[i].sub_heading+"</h2>\n"; }
			if (this.ar[i].address != null && this.ar[i].address != undefined) { html += "\t\t<p class=\"address\">"+this.ar[i].address+"</p>\n"; }
			if (this.ar[i].phone != null && this.ar[i].phone != undefined) { html += "\t\t<p class=\"phone\">"+this.ar[i].phone+"</p>\n"; }
			if (this.ar[i].content != null && this.ar[i].content != undefined) { html += "\t\t<p class=\"content\">"+this.ar[i].content+"</p>\n"; }
			
			html += "\t</div>\n";
			html += "</div>\n";
			target.container.el.append(html);
			this.locs[i] = $('.ncl-location#'+this.ar[i].id);
		}
	}
	Locations.prototype.css = function() {
		var l = this.locs.length;
		for (var i=0; i<l; i++) {
			this.locs[i].find('.ncl-location-contents').data({ "height" : this.locs[i].find('.ncl-location-contents').outerHeight() })
			this.locs[i].find('.ncl-location-contents').css({
				"top" : - $(this.locs[i]).find('.ncl-location-contents').data('height') - 50
			}).hide();
		}
	}
	Locations.prototype.focus = function(index) {
		$('.ncl-location-contents.ncl-active').removeClass('ncl-active').stop().fadeOut(250);
		this.locs[index].find('.ncl-location-contents').addClass('ncl-active').stop().fadeIn(250);
		$('.ncl-selected-location').removeClass('ncl-selected-location');
		this.locs[index].addClass('ncl-selected-location');
		var d = (this.locs[index].find('.ncl-location-contents').data('height'))/2;
		target.container.go_at((target.locations.ar[index].x)*target.container.z, (target.locations.ar[index].y)*target.container.z - d);
	}
	Locations.prototype.contract = function(index) {
		
	}
	Locations.prototype.refresh = function(no_anim) {
		var z = target.container.z;
		var l = this.ar.length;
		for (var i=0; i<l; i++) {
			$('.ncl-location#'+this.ar[i].id).css({
				"left" : this.ar[i].x * target.container.z,
				"top" : this.ar[i].y * target.container.z,
			});
		}
	}
	
	function Menu() {
		this.el;
		this.ul;
	}
	Menu.prototype.init = function() {
		target.wrapper.el.append('<div class="ncl-menu-wrap" />');
		this.el = target.wrapper.el.find('.ncl-menu-wrap');
		this.el.append('<ul />');
		this.ul = this.el.find('ul');
		
		var l = target.locations.ar.length;
		for (var i=0; i<l; i++) {
			this.ul.append('<li id="ncl-location-'+i+'">'+target.locations.ar[i].title+'</li>');
		}
	}
	
	function Map() {
		this.img;
		this.el;
	}
	Map.prototype.init = function() {
		this.img = new Image();
		this.img.src = O.image.src;
		$(this.img).addClass('ncl-map-image');
									
		target.container.el.append($(this.img));
		this.el = $(this.img);
	}
	
	function Navigation() {
		this.el;
		this.sliderPos;
		this.sliderDraggable;
		this.sliderHeight;
		this.sy;
		this.moy;
	}
	Navigation.prototype.init = function() {
		this.el;
		this.sliderPos = 100;
		
		this.html();
		this.css();
	},
	Navigation.prototype.html = function() {
		target.wrapper.el.append('<div class="ncl-nav-wrap" />');
		this.el = target.wrapper.el.find('.ncl-nav-wrap');
		
		var html;
		
		if (O.nav_ui.move_ui) {
			html = '<div class="ncl-nav-move">';
				html += '<div class="ncl-move-left"></div>';
				html += '<div class="ncl-move-right"></div>';
				html += '<div class="ncl-move-up"></div>';
				html += '<div class="ncl-move-down"></div>';
			html += '</div>';
		}
		
		if (O.nav_ui.zoom_ui) {
			html += '<div class="ncl-slider-wrap">';
				html += '<div class="ncl-slider">';
					html += '<div class="ncl-slider-draggable"></div>';
					html += '<div class="ncl-slider-slidebar"></div>';
				html += '</div>';
				html += '<div class="ncl-slider-zoomin"></div>';
				html += '<div class="ncl-slider-zoomout"></div>';
			html += '</div>';
		}
		
		this.el.append(html);
		
		this.sliderDraggable = this.el.find('.ncl-slider-draggable');
		this.sliderHeight = this.el.find('.ncl-slider').height();
		
		if (!O.nav_ui.move_ui && O.nav_ui.zoom_ui) {
			target.wrapper.el.find('.ncl-slider-wrap').addClass('ncl-single');
		}
	},
	Navigation.prototype.css = function() {
		
	}
	Navigation.prototype.update = function() {
		this.sliderPos = -(target.container.z - O.zoom.max)/(O.zoom.max-1)*100;
		
		this.sliderDraggable.css({
			"top" : this.sliderPos+"%"
		});
	}
	Navigation.prototype.drag_init = function(e) {
		this.sy = e.pageY;
		this.moy = 100;
		// this.sliderHeight = target.navigation.sliderHeight;
		
		this.sliderPos = (e.pageY - this.el.find('.ncl-slider').offset().top)/this.sliderHeight*100;
		target.navigation.sliderDraggable.css({
			"top" : this.sliderPos+'%'
		});
	}
	Navigation.prototype.drag_drag = function(e) {
		this.oy = this.sliderPos + ((e.pageY - this.sy)/this.sliderHeight * 100);
		this.oy = (this.oy > 100) ? 100 : (this.oy < 0) ? 0 : this.oy;
		
		this.sliderDraggable.css({
			"top" : this.oy+'%'
		});
		
		target.container.zoom_zoom_at((1 - (this.oy/100))*(O.zoom.max-1) + 1);
	}
	Navigation.prototype.drag_finish = function(e) {
		target.navigation.sliderPos = this.oy;
	}
	Navigation.prototype.touch_init = function(e) {
		target.container.el.stop();
		this.sd = Math.sqrt(Math.pow(e.touches[0].pageX - e.touches[1].pageX, 2) + Math.pow(e.touches[0].pageY - e.touches[1].pageY, 2));
		this.startPos = this.sliderPos;
	}
	Navigation.prototype.touch_drag = function(e) {
		this.d = Math.sqrt(Math.pow(e.touches[0].pageX - e.touches[1].pageX, 2) + Math.pow(e.touches[0].pageY - e.touches[1].pageY, 2));
		this.delta = this.d - this.sd;
		
		this.sliderPos = this.startPos - ((this.delta/6)/this.sliderHeight * 100);
		this.sliderPos = (this.sliderPos < 0) ? 0 : (this.sliderPos > 100) ? 100 : this.sliderPos;
		
		this.sliderDraggable.css({
			"top" : this.sliderPos+'%'
		});
		
		target.container.zoom_zoom_at((1 - (this.sliderPos/100))*(O.zoom.max-1) + 1);
	}
	Navigation.prototype.touch_finish = function(e) {
		this.sd = 0;
		this.d = 0;
		this.delta = 0;
		
		target.navigation.sliderPos = this.sliderPos;
	}
	
	function Fullscreen() {
		this.button;
		this.is_fullscreen;
		this.viewportWidth;
		this.viewportHeight;
		this.button;
	}
	Fullscreen.prototype.init = function() {
		this.html();
		this.button = target.wrapper.el.find('.ncl-fullscreen');
		this.is_fullscreen = false;
		
		if (typeof window.innerWidth != 'undefined')
		{
		     this.viewportWidth = window.innerWidth;
		     this.viewportHeight = window.innerHeight;
		}
	}
	Fullscreen.prototype.html = function() {
		target.wrapper.el.append('<div class="ncl-fullscreen" />');
	}
	Fullscreen.prototype.enter = function() {
		this.button.css({ "right" : 30 });
		this.is_fullscreen = true;
		target.wrapper.el.wrap('<div class="ncl-fullscreen-wrap" />');
		target.wrapper.el.parent().css({ "width" : this.viewportWidth, "height" : this.viewportHeight });
		
		if (O.width != 'auto') { target.wrapper.el.css({ "width" : '100%' }) }
		if (O.height != 'auto') { target.wrapper.el.css({ "height" : '100%' }) }
		
		target.wrapper.refresh();
		target.container.go_at(target.container.focal_point.x*target.container.z, target.container.focal_point.y*target.container.z, true);
	}
	Fullscreen.prototype.refresh = function() {
		if (typeof window.innerWidth != 'undefined')
		{
		     this.viewportWidth = window.innerWidth;
		     this.viewportHeight = window.innerHeight;
		}
		target.wrapper.el.parent().css({ "width" : this.viewportWidth, "height" : this.viewportHeight });
	}
	Fullscreen.prototype.exit = function() {
		this.button.css({ "right" : 15 });
		this.is_fullscreen = false;
		target.wrapper.el.unwrap();
		if (O.width != 'auto') { target.wrapper.el.css({ "width" : target.wrapper.css_width }) }
		if (O.height != 'auto') { target.wrapper.el.css({ "height" : target.wrapper.css_height }) }
		target.wrapper.refresh();
		target.container.go_at(target.container.focal_point.x*target.container.z, target.container.focal_point.y*target.container.z, true);
	}
	
	function Autohide() {
		this.ui;
	}
	Autohide.prototype.init = function() {
		var base = this;
		var visible = false;
		base.ui = $('.ncl-nav-move').add('.ncl-slider-wrap').add('.ncl-fullscreen').add('.ncl-menu-wrap');
		
		base.ui.fadeOut();
		
		target.wrapper.el.on('mouseover', function(e) {
			if (isWithinElement(e.pageX, e.pageY, target.wrapper.el)) { 
				base.ui.fadeIn();
			}
		});
		
		target.wrapper.el.on('mouseout', function(e) {
			if (!isWithinElement(e.pageX, e.pageY, target.wrapper.el)) { 
				base.ui.fadeOut();
			}
		});
	}
	
	function Mouse() {
		this.mouseDown;
		this.dragging;
		this.sliderDragging;
		this.sliderMouseDown;
	}
	Mouse.prototype.init = function() {
		var base = this;
		
		base.mouseDown = false;
		base.dragging = false;
		base.sliderDragging = false;
		base.sliderMouseDown = false;
		
		// mousedown
		target.wrapper.el.on('mousedown', function(e) {
			e.preventDefault();
			
			if (O.animations.inertia && target.container.interval != 1) { 
				clearInterval(target.container.interval); 
			}
			
			if ($(e.target).closest('.ncl-slider').length != 0) {
				base.sliderMouseDown = true;
			} else {
				base.mouseDown = true;
			}
			
			return false;
		});
		$(document).on('mousemove', function(e) {
			e.preventDefault();
			if (base.mouseDown && !base.dragging) {
				base.dragging = true;
				target.container.drag_init(e);
			}
			if (base.dragging) {
				target.container.drag_drag(e);
			}
			
			if (base.sliderMouseDown && !base.sliderDragging) {
				base.sliderDragging = true;
				target.navigation.drag_init(e);
			}
			if (base.sliderDragging) {
				target.navigation.drag_drag(e);
			}
			return false;
		});
		$(document).on('mouseup', function(e) {
			if (base.mouseDown) {
				base.mouseDown = false;
			}
			if (base.dragging) {
				base.dragging = false;
				target.container.drag_finish(e);
			}
			
			if (base.sliderMouseDown) {
				base.sliderMouseDown = false;
			}
			if (base.sliderDragging) {
				base.sliderDragging = false;
				target.navigation.drag_finish(e);
			}
		});
		
		// click
		target.wrapper.el.on('click', function(e) {
			if ($(e.target).hasClass('ncl-fullscreen')) {
				if (target.fullscreen.is_fullscreen) { 
					target.fullscreen.exit(); 
				} else {
					target.fullscreen.enter();
				}
			} else if ($(e.target).closest('.ncl-menu-wrap').length != 0) {
				var index = $(e.target).attr('id').replace('ncl-location-', '');									
				target.locations.focus(index);
			} else if ($(e.target).hasClass('ncl-location-pin')) {
				var index = $(e.target).attr('data-id');
				target.locations.focus(index);
			} else if ($(e.target).hasClass('ncl-slider-zoomin')) {
				target.container.zoom_zoom_in();
			} else if ($(e.target).hasClass('ncl-slider-zoomout')) {
				target.container.zoom_zoom_out();
			} else if ($(e.target).parent().hasClass('ncl-nav-move')) {
				var direction = $(e.target).attr('class').replace('ncl-move-', '');
				target.container.move(direction);
			} else if ($(e.target).hasClass('ncl-location-close')) {
				$('.ncl-location-contents.ncl-active').removeClass('ncl-active').stop().fadeOut(250);
			}
		});
	}
	
	function Scroller() {
		
	}
	Scroller.prototype.init = function() {
		var base = this;
		target.container.el.mousewheel(function(e, delta) {
			e.preventDefault();
			if (O.animations.inertia && target.container.interval != 1) {
				clearInterval(target.container.interval); 
			}
			if (delta > 0) {
				target.container.zoom_zoom_in();
				
			} else {
				target.container.zoom_zoom_out();
			}
			return false;
		});
	}
	
	function Touch() {
		this.fingerDown;
		this.dragging;
		this.sliderFingerDown;
		this.sliderDragging;
		this.twoFingersDown;
		this.twoFingersDragging;
	}
	Touch.prototype.init = function() {
		var base = this;
		
		base.fingerDown = false;
		base.dragging = false;
		base.sliderFingerDown = false;
		base.sliderDragging = false;
		base.twoFingersDown = false;
		base.twoFingersDragging = false;
		
		target.wrapper.el.get(0).addEventListener('touchstart', function(e) {
			e.preventDefault();
			
			if (O.animations.inertia && target.container.interval != 1) { 
				clearInterval(target.container.interval); 
			}
			
			if (e.touches.length > 1) {
				base.twoFingersDown = true;
			} else if ($(e.target).hasClass('ncl-fullscreen')) {
				if (target.fullscreen.is_fullscreen) { 
					target.fullscreen.exit(); 
				} else {
					target.fullscreen.enter();
				}
			} else if ($(e.target).closest('.ncl-menu-wrap').length != 0) {
				var index = $(e.target).attr('id').replace('ncl-location-', '');									
				target.locations.focus(index);
			} else if ($(e.target).hasClass('ncl-location-pin')) {
				var index = $(e.target).attr('data-id');
				target.locations.focus(index);
			} else if ($(e.target).closest('.ncl-slider').length != 0) {
				base.sliderFingerDown = true;
			} else if ($(e.target).hasClass('ncl-slider-zoomin')) {
				target.container.zoom_zoom_in();
			} else if ($(e.target).hasClass('ncl-slider-zoomout')) {
				target.container.zoom_zoom_out();
			} else if ($(e.target).parent().hasClass('ncl-nav-move')) {
				var direction = $(e.target).attr('class').replace('ncl-move-', '');
				target.container.move(direction);
			}
			 else {
				base.fingerDown = true;
			}
			return false;
		}, false);
		document.addEventListener('touchmove', function(e) {
			if (base.fingerDown && !base.dragging && e.touches.length == 1) {
				e.preventDefault();
				base.dragging = true;
				target.container.drag_init(e.touches[0]);
			} else if (base.dragging && e.touches.length == 1) {
				e.preventDefault();
				target.container.drag_drag(e.touches[0]);
			} else if (base.sliderFingerDown && !base.sliderDragging && e.touches.length == 1) {
				e.preventDefault();
				base.sliderDragging = true;
				target.navigation.drag_init(e.touches[0]);
			} else if (base.sliderDragging && e.touches.length == 1) {
				e.preventDefault();
				target.navigation.drag_drag(e.touches[0]);
			} else if (base.twoFingersDown && !base.twoFingersDragging) {
				e.preventDefault();
				base.twoFingersDragging = true;
				target.navigation.touch_init(e);
			} else if (base.twoFingersDragging) {
				e.preventDefault();
				target.navigation.touch_drag(e);
			}
			return false;
		}, false);
		document.addEventListener('touchend', function(e) {
			if (base.fingerDown) {
				e.preventDefault();
				base.fingerDown = false;
			}
			if (base.dragging) {
				e.preventDefault();
				base.dragging = false;
				target.container.drag_finish(e.touches[0]);
			}
			if (base.sliderFingerDown) {
				e.preventDefault();
				base.sliderFingerDown = false;
			}
			if (base.sliderDragging) {
				e.preventDefault();
				base.sliderDragging = false;
				target.navigation.drag_finish(e.touches[0]);
			}
			if (base.twoFingersDown) {
				e.preventDefault();
				base.twoFingersDown = false;
				target.navigation.touch_finish();
			}
			if (base.twoFingersDragging) {
				e.preventDefault();
				base.twoFingersDragging = false;
				target.navigation.touch_zoom.finish();
			}
			return false;
		}, false);
	}
	
	function Window() {
		
	}
	Window.prototype.init = function() {
		$(window).on('resize.ncl', function() {
			target.wrapper.refresh();
			target.container.go_at(target.container.focal_point.x*target.container.z, target.container.focal_point.y*target.container.z, true);
			if (target.fullscreen.is_fullscreen) {
				target.fullscreen.refresh();
			}
		});
	}
	
	$.fn.rmap = function(options) {
		var D = {
			width : 'auto',
			height : 'auto',
			image : {
				src : 'images/map.jpg'
			},
			nav_ui : {
				show : true,
				autohide : false,
				move_ui : true,
				zoom_ui : true
			},
			menu : {
				show : true
			},
			animations : {
				move : true,
				inertia : true
			},
			zoom : {
				initial : 1,
				max : 5
			},
			fullscreen : {
				enabled : true,
				start_in_fullscreen : false
			},
			initial_location : false
		};
		
		O = $.extend(true, D, options);
		
		function normalize_options(options) {
			if (options.fullscreen) {
				options.width = 'auto';
				options.height = 'auto';
			}
			if (options.zoom.initial < 1) options.zoom.initial = 1;
		}
		
		return this.each(function() {
			var wrapper = new Wrapper(),
				container = new Container(),
				locations = new Locations(),
				menu = new Menu(),
				map = new Map(),
				navigation = new Navigation(),
				fullscreen = new Fullscreen(),
				autohide = new Autohide(),
				_mouse = new Mouse(),
				_touch = new Touch(),
				_scroller = new Scroller(),
				_window = new Window();
				
			var el = $(this);
			
			var img = new Image();
			$(img).attr('src', O.image.src);
			
			img.onload = function() {
				O.image.width = img.width;
				O.image.height = img.height;
				
				el.addClass('ncl-root');
				
				target = {
					el : el,
					wrapper : wrapper,
					container : container,
					locations : locations,
					menu : menu,
					map : map,
					navigation : navigation,
					fullscreen : fullscreen,
					autohide : autohide,
					_mouse : _mouse,
					_touch : _touch,
					_scroller : _scroller,
					_window : _window
				}

				target.wrapper.init();
				target.container.init();
				target.map.init();
				target.locations.init();
				if (O.nav_ui.show) { target.navigation.init(); }
				if (O.menu.show) { target.menu.init(); }
				if (O.fullscreen.enabled) { target.fullscreen.init(); }

				target._mouse.init();
				if ('ontouchstart' in document.documentElement) { target._touch.init(); }
				target._scroller.init();
				target._window.init();

				if (O.fullscreen.start_in_fullscreen) target.fullscreen.enter();

				if (O.zoom.initial > 1) {
					target.container.zoom_zoom_at(O.zoom.initial);
					target.navigation.update();
				}

				if (O.nav_ui.autohide) {
					target.autohide.init();
				}
				
				if (O.initial_location != false && O.initial_location <= target.locations.ar.length && O.initial_location > 0) {
					target.locations.focus(O.initial_location - 1);
				}
			}
				
						
		});
	}
})(jQuery);

jQuery.easing['jswing'] = jQuery.easing['swing'];

jQuery.extend( jQuery.easing,
{
	easeInCubic: function (x, t, b, c, d) {
		return c*(t/=d)*t*t + b;
	},
	easeOutCubic: function (x, t, b, c, d) {
		return c*((t=t/d-1)*t*t + 1) + b;
	},
	easeInOutCubic: function (x, t, b, c, d) {
		if ((t/=d/2) < 1) return c/2*t*t*t + b;
		return c/2*((t-=2)*t*t + 2) + b;
	}
});

(function(d){function e(a){var b=a||window.event,c=[].slice.call(arguments,1),f=0,e=0,g=0,a=d.event.fix(b);a.type="mousewheel";b.wheelDelta&&(f=b.wheelDelta/120);b.detail&&(f=-b.detail/3);g=f;void 0!==b.axis&&b.axis===b.HORIZONTAL_AXIS&&(g=0,e=-1*f);void 0!==b.wheelDeltaY&&(g=b.wheelDeltaY/120);void 0!==b.wheelDeltaX&&(e=-1*b.wheelDeltaX/120);c.unshift(a,f,e,g);return(d.event.dispatch||d.event.handle).apply(this,c)}var c=["DOMMouseScroll","mousewheel"];if(d.event.fixHooks)for(var h=c.length;h;)d.event.fixHooks[c[--h]]=
d.event.mouseHooks;d.event.special.mousewheel={setup:function(){if(this.addEventListener)for(var a=c.length;a;)this.addEventListener(c[--a],e,!1);else this.onmousewheel=e},teardown:function(){if(this.removeEventListener)for(var a=c.length;a;)this.removeEventListener(c[--a],e,!1);else this.onmousewheel=null}};d.fn.extend({mousewheel:function(a){return a?this.bind("mousewheel",a):this.trigger("mousewheel")},unmousewheel:function(a){return this.unbind("mousewheel",a)}})})(jQuery);
