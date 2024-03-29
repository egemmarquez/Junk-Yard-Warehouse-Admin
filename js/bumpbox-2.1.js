/* <![CDATA[ */ 
// firefox scrolling fix function
Element.implement({
  setFocus: function(index) {
    this.setAttribute('tabIndex',index || 0);
    this.focus();
  }
});
evLeftRightKey = function (ev) {
    if (ev.key == 'right') {
    	if($$('#grow #next') && $$('#grow #next').length>0){
    		$$('#grow #next')[0].fireEvent('click');
    	}
    }
    if (ev.key == 'left') {
    	if($$('#grow #prev') && $$('#grow #prev').length>0){
    		$$('#grow #prev')[0].fireEvent('click');
    	}
    }
}
function doBump(names, inSpeed, outSpeed, boxColor, backColor, bgOpacity, bRadius, borderWeight, borderColor, boxShadowSize, boxShadowColor, iconSet, effectsIn, effectsOut, bgImage, bgPosition, bgRepeat, noLRcommands, onloadFireEventClass, onloadFireEventDelay, callbackFunc) {
    i = 0;
    if (!noLRcommands) {
    	noLRcommands = 0;
    }
    var nameClass = names.replace(/\./, '');
    var imgstore = new Array();
    var allBumps = null;
    allBumps = $$(names);
    allBumps.each(function (e) {
        var content = e.get('href');
        if (e.get('href').indexOf('^') == 0) {
            var id = e.get('href').replace("^", '');
            $(id).setStyle('display', 'none');
        }
        var xid = e.get('href').split("/");
        var imgN = xid[xid.length - 1].split(".");
        imgN = imgN[0];
        if (e.get('href').indexOf('.jpg') != -1 || e.get('href').indexOf('.png') != -1 || e.get('href').indexOf('.gif') != -1) {
            var myImage = Asset.image(e.get('href'), {
                onLoad: function (myImage, imgN) {
                    var xid = e.get('href').split("/");
                    var imgN = xid[xid.length - 1].split(".");
                    imgN = imgN[0];
                    if (!$(imgN)) {
                        myImage.set('id', imgN);
                        myImage.setStyle('display', 'none');
                        myImage.inject(document.body);
                    }
                }
            });
        }
        if(noLRcommands > 0){
        	e.set('id', nameClass + Math.random().toString().substring(2));
        } else {
        	e.set('id', nameClass + '_' + i);
            ++i;
        }
    })
    var f = "";
    var i = 0;
    var actualID = 0;
    if (!inSpeed) {
        inSpeed = 750;
    }
    if (!outSpeed) {
        outSpeed = 250;
    }
    if (!boxColor) {
        boxColor = '000'
    }
    if (!backColor) {
        backColor = '000'
    }
    if (!bgOpacity || bgOpacity > 1) {
        bgOpacity = 0.3
    }
    if (!bRadius) {
        bRadius = 7;
    }
    if (!borderWeight) {
        borderWeight = 2;
    }
    if (!borderColor) {
        borderColor = '303132';
    }
    if (!boxShadowSize) {
        boxShadowSize = 10;
    }
    if (!boxShadowColor) {
        boxShadowColor = '000';
    }
    if (!iconSet) {
        iconSet = 4;
    }
    if (!effectsIn) {
        effectsIn = new Fx.Transition(Fx.Transitions.Quad.easeInOut, inSpeed);
    }
    if (!effectsOut) {
        effectsOut = new Fx.Transition(Fx.Transitions.Quad.easeOut, outSpeed);
    }
    if (!bgPosition) {
        bgPosition = 'center center';
    }
    if (!bgRepeat) {
        bgRepeat = 'no-repeat';
    }
    if (!bgImage) {
        bgImage = 'images/ajax-loader.gif';
    }
    if (!onloadFireEventClass) {
    	onloadFireEventClass = 0;
    }
    if (!onloadFireEventDelay) {
    	onloadFireEventDelay = 0;
    }
    var iconPath = 'iconsets/' + iconSet + '/';
    // position close button according to border width
    closeBtnPos = borderWeight + 10;
    closeBtnPos = -closeBtnPos;
    nextBtnPos = borderWeight + 20;
    prevBtnPos = borderWeight + 20;
    prevBtnPos = -prevBtnPos;
    $$(names).addEvent('click', function (e) {
    	if (e){ // this makes fireEvents work ..i.e. fire bumpbox ondomready
    		e = new Event(e).stop();
    	}
		
		embeds = document.getElementsByTagName('object');
		for(i = 0; i < embeds.length; i++) {
			 embeds[i].style.visibility = 'hidden';
		}
		
		
        if ($('grow') != null) {
            $('grow').dispose();
        }
        if (this.get('rev') != null) {
            var rev = this.get('rev')
        }
        var content = this.get('href');
        // get the num value from the id
        var actualID = this.get('id');
        var tmpActual = actualID.split(/_/);
        actualID = tmpActual[1];
        maxw = 0;
        maxh = 0;
        var title = "";
        //$$('object').setStyle('display', 'none');
        if (this.get('rel') != null) {
            var tmp = this.get('rel').split("-");
            maxw = tmp[0];
            maxh = tmp[1];
        }
        if (this.get('title') != null) {
            title = this.get('title');
        }
        if (this.get('href') != null) {
            hr = this.get('href');
        }
        if (maxw == 0) {
            maxw = 880;
        }
        if (maxh == 0) {
            maxh = 600;
        }
        if (content.indexOf(".jpg") != -1 || content.indexOf(".gif") != -1 || content.indexOf(".png") != -1) {
            img = new Image();
            img.src = content;
            maxw = img.width;
            maxh = img.height;
        }
        w = window.getSize().x.toInt();
        h = window.getSize().y.toInt();
        s = window.getScrollTop();
        var middleH = (w) / 2;
        var middleV = (h) / 2;
        var endleft = (w - maxw) / 2;
        var endtop = ((h - maxh) / 2) + s;
        var theBorder = borderWeight + 'px solid #' + borderColor;
        var theBackground = '#' + boxColor + '  url(' + bgImage + ') ' + bgRepeat + ' ' + bgPosition;
        if ($('grow') != null) {
            $('grow').dispose();
        }
        var el = new Element('div', {
            'styles': {
                width: '1px',
                height: '1px',
                position: 'absolute',
                border: theBorder,
                padding: '4px',
                background: theBackground,
                left: middleH,
                top: middleV,
                /*cursor: 'pointer',*/
                display: 'block',
                'z-index': '100000'
            },
            'id': 'grow'
        })
        $(el).setStyles({
            '-moz-border-radius': bRadius + 'px',
            '-webkit-border-radius': bRadius + 'px',
            'border-radius': bRadius + 'px'
        });
        var t = window.getScrollTop();
        bg = new Element('div', {
            'styles': {
                background: '#' + backColor,
                width: '100%',
                height: '100%',
                opacity: bgOpacity,
                position: 'absolute',
                top: t,
                left: 0,
                'z-index': '100000'
            },
            'id': 'bg'
        }) /* bg ie 6 fix */
        if (Browser.Engine.name == 'trident' && Browser.Engine.version == 4) {
            var bh = window.getHeight();
            $(bg).setStyle('height', bh);
        }
        var cl = new Element('img', {
            'styles': {
                width: '24px',
                height: '24px',
                position: 'absolute',
                top: closeBtnPos + 'px',
                right: closeBtnPos + 'px',
                cursor: 'pointer',
                'z-index': '100000'
            },
            'src': iconPath + 'closed.png',
            'id': 'nycloser'
        })
        cl.addEvent('click', function (e) {
			
			embeds = document.getElementsByTagName('object');
				for(i = 0; i < embeds.length; i++) {
			 		embeds[i].style.visibility = 'visible';
				}
			
        	bg.setFocus(); // ff scrolling fix
            bg.dispose();
            // remove left/right key event
            window.removeEvent('keyup',evLeftRightKey);
            $(el).getChildren().dispose();
			 w = window.getSize().x.toInt();
			 h = window.getSize().y.toInt();
			 s = window.getScrollTop();
			 var middleH = (w) / 2;
			 var middleV = (h) / 2;
		 	 var endleft = (w - maxw) / 2;
			 var endtop = ((h - maxh) / 2) + s;
            eff2.start({
                'width': [maxw, 1],
                'height': [maxh, 1],
                'left': [endleft, middleH],
                'top': [endtop, middleV + s]
            })
        })
        if (Browser.Engine.name != 'trident') {
            window.addEvent('keyup', function (e) {
				
					embeds = document.getElementsByTagName('object');
						for(i = 0; i < embeds.length; i++) {
			 				embeds[i].style.visibility = 'visible';
						}
				
				
                if (e.key == 'esc') {
                	bg.setFocus(); //ff scrolling fix
                    bg.dispose();
                    // remove left/right key event
                    window.removeEvent('keyup',evLeftRightKey);
                    $(el).getChildren().dispose();
					w = window.getSize().x.toInt();
					h = window.getSize().y.toInt();
					s = window.getScrollTop();
					var middleH = (w) / 2;
					var middleV = (h) / 2;
					var endleft = (w - maxw) / 2;
					var endtop = ((h - maxh) / 2) + s;
                    eff2.start({
                        'width': [maxw, 1],
                        'height': [maxh, 1],
                        'left': [endleft, middleH],
                        'top': [endtop, middleV + s]
                    })
                }
            })
        } else {
            document.addEvent('keyup', function (e) {
				
				embeds = document.getElementsByTagName('object');
				for(i = 0; i < embeds.length; i++) {
			 		embeds[i].style.visibility = 'visible';
				}
				
                if (e.key == 'esc') {
                    bg.dispose();
                    // remove left/right key event
                    window.removeEvent('keyup',evLeftRightKey);
                    $(el).getChildren().dispose();
					w = window.getSize().x.toInt();
					h = window.getSize().y.toInt();
					s = window.getScrollTop();
					var middleH = (w) / 2;
					var middleV = (h) / 2;
					var endleft = (w - maxw) / 2;
					var endtop = ((h - maxh) / 2) + s;
								
                    eff2.start({
                        'width': [maxw, 1],
                        'height': [maxh, 1],
                        'left': [endleft, middleH],
                        'top': [endtop, middleV + s]
                    })
                }
            })
        }
        bg.inject(document.body);
        el.injectInside(document.body);
        cl.injectInside(el);
        window.addEvent('scroll', function () {
        $(bg).setStyle('top', window.getScrollTop());
		w = window.getSize().x.toInt();
        h = window.getSize().y.toInt();
        s = window.getScrollTop();
        var middleH = (w) / 2;
        var middleV = (h) / 2;
        var endleft = (w - maxw) / 2;
        var endtop = ((h - maxh) / 2) + s;
			$(el).setStyle('top', endtop);
        })
        var eff3 = new Fx.Morph($('grow'), {
            transition: effectsIn,
            duration: inSpeed,
            wait: 'link',
            onComplete: function () {
                $(el).dispose();
            }
        });
        var eff2 = new Fx.Morph($('grow'), {
            transition: effectsOut,
            duration: outSpeed,
            wait: 'link',
            onComplete: function () {
                $(el).dispose();
            }
        });
        var eff = new Fx.Morph($('grow'), {
            transition: effectsIn,
            duration: inSpeed,
            wait: 'link',
            onComplete: function () {
                if (bgImage != null) {
                    var theBackground = '#' + boxColor + '  url(' + bgImage + ') ' + bgRepeat + ' ' + bgPosition;
                    $(el).setStyle('background', theBackground);
                } else {
                    $(el).setStyle('background', '#' + boxColor);
                }
                if ($('prev') != null) {
                    $('prev').setStyle('display', 'block');
                }
                if ($('next') != null) {
                    $('next').setStyle('display', 'block');
                }
                $('grow').setStyle('-moz-box-shadow', '3px 3px ' + boxShadowSize + 'px #' + boxShadowColor);
                $('grow').setStyle('-webkit-box-shadow', '3px 3px ' + boxShadowSize + 'px #' + boxShadowColor);
                $('grow').setStyle('box-shadow', '3px 3px ' + boxShadowSize + 'px #' + boxShadowColor);
                if (content.indexOf(".jpg") != -1 || content.indexOf(".gif") != -1 || content.indexOf(".png") != -1) {
                    var img = new Element('img');
                    img.src = content;
                    maxw = img.width;
                    maxh = img.height;
                    document.id(img).inject(el);
                } else if (content.indexOf('.flv') == -1 && content.indexOf('.mp3') == -1 && content.indexOf(".pdf") == -1 && content.indexOf(".swf") == -1 && content.indexOf(".jpg") == -1 && content.indexOf(".gif") == -1 && content.indexOf(".png") == -1 && content.indexOf("^") == -1) {
                    var p = new Element('div');
                    p.setStyle('display', 'block');
                    p.setStyle('overflow', 'hidden');
                    p.setStyle('padding', '20px');
                    p.setStyle('height', maxh - 40);
                    p.setStyle('width', maxw - 40);
                    p.setAttribute('id', 'htmlframe');
                    p.inject(el);
                    var x = new IFrame();
                    x.setStyle('overflow', 'auto');
                    x.set('frameborder', '0');
                    x.setStyle('width', maxw - 40);
                    x.setStyle('height', maxh - 40);
                    x.src = content;
                    x.inject(p);
                } else if (content.indexOf(".pdf") != -1) {
                    var div = new Element('div', {
                        'styles': {
                            padding: '20px',
                            height: maxh - 40,
                            width: maxw - 40
                        }
                    })
                    div.inject(el);
                    var x = new IFrame();
                    x.src = content;
                    x.setStyle('width', maxw - 40);
                    x.setStyle('height', maxh - 40);
                    x.inject(div);
                } else if (content.indexOf(".swf") != -1) {
                    var div = new Element('div', {
                        'styles': {
                            padding: '20px',
                            height: maxh - 40,
                            width: maxw - 40
                        },
                        id: 'swf'
                    })
                    div.inject(el);
                    var obj = new Swiff(content, {
                        id: 'video',
                        width: maxw - 40,
                        height: maxh - 40,
                        container: div
                    })
                } else if (content.indexOf(".flv") != -1) {
                    var div = new Element('div', {
                        'styles': {
                            padding: '20px',
                            height: maxh - 40,
                            width: maxw - 40
                        },
						id: 'flowp'
                    })
                    div.inject(el);
                   
				  	 jwplayer(div).setup({
						  flashplayer: 'mediaplayer/player.swf',
						  file: content,
						  width: maxw,
						  height: maxh,
						  wmode:'transparent',
						  skin: 'skins/glow/glow.zip'
 			});
				   
                } else if (content.indexOf(".mp3") != -1) {
                    var div = new Element('div', {
                        'styles': {
                            padding: '20px',
                            height: maxh - 50,
                            width: maxw - 40,
                            'z-index': '1'                            
                        },
						id:'flowp'
                    })
                    div.inject(el);
					  jwplayer(div).setup({
						  flashplayer: 'mediaplayer/player.swf',	
						  type:'sound',			 
						  width: maxw,
						  height: maxh,
						  file:content,
						  src:content,
						  controlbar: 'bottom',
						  autoplay:'true',
						  skin: 'skins/glow/glow.zip'
					});
                } else if (content.indexOf("youtube") == 0 || content.indexOf("vimeo") == 0) {
               
						   var p = new Element('div');
						p.setStyle('display','block');
						p.setStyle('overflow','hidden');
						p.setStyle('padding','20px');
						p.setStyle('height',maxh-40);
						p.setStyle('width',maxw-40);
						p.setAttribute('id','htmlframe');
						p.inject(el);
						
					 jwplayer(p).setup({
						  flashplayer: 'mediaplayer/player.swf',				 
						  width: maxw,
						  height: maxh,
						  file:content,
						  autostart:false,
						  type:'sound',
						  controlbar: 'bottom',
						  'provider':'youtube'
						  
					});
                } else if (content.indexOf("^") == 0) {
                    content = content.replace("^", "");
                    var div = new Element('div', {
                        'styles': {
                            padding: '20px',
                            height: 'auto',
                            width: 'auto',
                            overflow: 'hidden'
                        },'class':'inlineHTMLBox' //added so you can style elements inside with css
                    })
                    var c = document.id(content).get('html');
                    div.set('html', c);
                    div.inject(el);
                }
                var titlePlacement = 30 + borderWeight;
                titlePlacement = -titlePlacement;
                if (title != "") {
                    var t = new Element('div', {
                        'styles': {
                            'height': 'auto',
                            'line-height': '15px',
                            'position': 'absolute',
                            'top': titlePlacement + 'px',
                            'left': '0px',
                            'color': '#eee',
                            'opacity': '0.9',
                            'z-index': '10000',
                            'background': '#636363',
                            '-webkit-border-radius': '5px',
                            '-moz-border-radius': '5px',
                            '-border-radius': '5px',
                            'display': 'block',
                            'padding': '6px 5px',
                            'border': '1px solid #' + borderColor
                        }
                    })
                    t.set('html', title);
                    t.inject(el);
                    t.set('id', 'maindesc');
                }
                if (rev != null) {
                    var x1 = new Element('div', {
                        'styles': {
                            'width': 'auto',
                            'height': '20px',
                            'position': 'absolute',
                            'left': '20px',
                            'bottom': '-41px',
                            'color': '#eee',
                            'text-decoration': 'none',
                            'background': '#000',
                            '-webkit-border-radius': '5px',
                            '-moz-border-radius': '5px',
                            '-border-radius': '5px',
                            'display': 'block',
                            'padding': '10px',
                            'border-bottom': '2px solid #303132',
                            'border-left': '2px solid #303132',
                            'border-right': '2px solid #303132'
                        }
                    })
                    x1.inject(el);
                    x1.set('html', rev);
                    x1.set('id', 'addondesc');
                }
				$(el).setStyles({
					'background-image': 'none'
				});
				// added option for onComplete callback function as a new argument
				if (callbackFunc != null && typeof window[callbackFunc] == "function") {
					window[callbackFunc]();
				}
            }
        });
        // add event to the left/right key
        window.addEvent('keyup', evLeftRightKey);
        $(bg).addEvent('click', function (e) {
        	bg.setFocus(); // ff scrolling fix
            bg.dispose();
            // remove left/right key event
            window.removeEvent('keyup',evLeftRightKey);
            $(el).getChildren().dispose();
            eff2.start({
                'width': [maxw, 1],
                'height': [maxh, 1],
                'left': [endleft, middleH],
                'top': [endtop, middleV + s]
            })
        })
        var nextID = this.get('id');
        var tmp = nextID.split(/_/);
        if(tmp[1] != undefined){
	        tmp = tmp[1].toInt() + 1;
	        if (allBumps[tmp] != null) {
	            var middle = (maxh - 30) / 2;
	            var nx = new Element('a', {
	                'styles': {
	                    width: '30px',
	                    height: '30px',
	                    background: 'url(' + iconPath + 'next.png) no-repeat center center',
	                    position: 'absolute',
	                    right: -nextBtnPos + 'px',
	                    bottom: middle,
	                    cursor: 'pointer',
	                    'display': 'none'
	                },
	                id: 'next'
	            })
	            nx.addEvent('click', function (e) {
	                if (Browser.Engine.trident) {
	                    if (document.id('video') != null) {
	                        document.id('video').stop();
	                    }
	                    if (document.id('swf') != null) {
	                        document.id('swf').dispose();
	                    }
	                }
	                document.id('bg').dispose();
	                document.id('grow').dispose();
	                var nextID = actualID.toInt() + 1;
	                var finalID = nameClass + '_' + nextID;
	                document.id(finalID).fireEvent('click', this);
	            })
	            nx.inject(el);
	        }
	        var prevID = this.get('id');
	        var prevTmp = prevID.split('_');
	        prevTmp = prevTmp[1].toInt() - 1;
	        if (allBumps[prevTmp] != null) {
	            var middle = (maxh - 30) / 2;
	            var nx2 = new Element('a', {
	                'styles': {
	                    width: '30px',
	                    height: '30px',
	                    background: 'url(' + iconPath + 'prev.png) no-repeat center center',
	                    position: 'absolute',
	                    left: prevBtnPos + 'px',
	                    bottom: middle,
	                    cursor: 'pointer',
	                    'display': 'none'
	                },
	                id: 'prev'
	            })
	            nx2.addEvent('click', function (e) {
	                if (Browser.Engine.trident) {
	                    if (document.id('video') != null) {
	                        document.id('video').stop();
	                    }
	                    if (document.id('swf') != null) {
	                        document.id('swf').dispose();
	                    }
	                }
	                document.id('bg').dispose();
	                document.id('grow').dispose();
	                var previousID = actualID.toInt() - 1;
	                var previousLnk = nameClass + '_' + previousID;
	                actualID = previousID;
	                document.id(previousLnk).fireEvent('click', this);
	            })
	            nx2.inject(el);
	        }
        }
        eff.start({
            'width': [1, maxw],
            'height': [1, maxh],
            'left': [middleH, endleft],
            'top': [middleV + s, endtop]
        })
    });
    if (noLRcommands > 0 && onloadFireEventClass != 0) { //added for autoload bumpbox on domready
    	window.addEvent('domready', function(){$$(names).each(function(e){if(e.get('class').search(onloadFireEventClass) != -1){e.fireEvent('click',null,onloadFireEventDelay);}});});
    }
    
}

/* ]]> */