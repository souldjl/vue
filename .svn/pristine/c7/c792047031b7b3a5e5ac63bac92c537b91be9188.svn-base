// JavaScript Document
/*!
 * Gensee-Player JavaScript SDK
 * http://www.gensee.com/
 * Date: 2014-3-17
 */
;(function (global, undefined) {
	if (GS == undefined) {
		throw new Error("ERR000","错误：请优先加载JS-SDK！");
		return;
	}
	if (GS._GsX_ !== undefined) {
		return;
	}
	jQuery.support.cors = true;
	
	var SDK = GS._open_;
	
	var ConfigHelper = (function() {
		var helper = {};
		helper.all = ["annex",
		              "chapter",
		              "chat",
		              "chat-vod",
		              "ctrl-live",
		              "ctrl-vod",
		              "infobox",
		              "literal",
		              "lottery",
		              "lvmsg",
		              "menu",
		              "net",
		              "qa-live",
		              "qalive-popup",
		              "qa-vod",
		              "qavod-popup",
		              "rollcall",
		              "userlist",
		              "vote",
		              "public-chat",
		              "vote-result",
		              "iframe",
		              "publish-card",
		              "red-packet",
		              "reward"];
		var defaults = {
		  _default:["float", {"float":"v1", "edu":"v1"}] //[defaultUI, {UI1defaultVer,UI2defaultVer}]
			//"qa-live":["float", {"float":"v1"}]
		};
		var modules = {
			float:{
				v1:{
					dir:"/float/v1/",
					css:"/float/v1/common.css",
					wgs:["annex",
			              "chapter",
			              "chat",
			              "chat-vod",
			              "ctrl-live",
			              "ctrl-vod",
			              "infobox",
			              "literal",
			              "lottery",
			              "lvmsg",
			              "menu",
			              "net",
			              "qa-live",
			              "qa-vod",
			              "rollcall",
			              "userlist",
			              "vote",
			              "vote-result",
			              "iframe"]
				}
			},
			edu:{
				v1:{
					dir:"/edu/v1/",
					css:"/edu/v1/common.css",
					wgs:["annex",
			              "chapter",
			              "chat",
			              "ctrl-live",
			              "ctrl-vod",
			              "infobox",
			              "literal",
			              "lottery",
			              "lvmsg",
			              "menu",
			              "net",
			              "qa-live",
			              "qa-vod",
			              "rollcall",
			              "userlist",
			              "vote",
			              "public-chat",
			              "vote-result"]
				}
			},
            popular:{
                v1:{
                    dir:"/popular/v1/",
                    css:"/popular/v1/common.css",
                    wgs:["annex",
                        "chapter",
                        "chat",
                        "chat-vod",
                        "ctrl-live",
                        "ctrl-vod",
                        "infobox",
                        "literal",
                        "lottery",
                        "lvmsg",
                        "menu",
                        "net",
						"qalive-popup",
                        "qa-live",
                        "qavod-popup",
                        "qa-vod",
                        "rollcall",
                        "userlist",
                        "vote",
                        "vote-result",
                        "iframe",
  		                "publish-card",
  		                "red-packet",
  		                "reward"]
                }
            },
            classic:{
                v1:{
                    dir:"/classic/v1/",
                    css:"/classic/v1/common.css",
                    wgs:["annex",
                        "chapter",
                        "chat",
                        "chat-vod",
                        "ctrl-live",
                        "ctrl-vod",
                        "infobox",
                        "literal",
                        "lottery",
                        "lvmsg",
                        "menu",
                        "net",
						"qalive-popup",
                        "qa-live",
						"qavod-popup",
                        "qa-vod",
                        "rollcall",
                        "userlist",
                        "vote",
                        "vote-result",
                        "iframe",
  		                "publish-card",
  		                "red-packet",
  		                "reward"]
                }
            }
		};
		var libs = {
			//jquery:'/js/lib/jquery-1.9.1.min',
			tmpl:'/widgets/core/micro-templating.resig.gs',
			jqueryui:'/js/lib/jquery-ui-1.10.3.custom.min'
			//,
			//mousewheel:'/js/lib/jquery.mousewheel',
			//jscrollpane:'/js/lib/jquery.jscrollpane.min'
		};

		function getQueryValue(src, key){
			var reg = new RegExp("[&|\\?]"+key+"=([^&]*)", "i");
			var m = src.match(reg);
			if(m){
				return m[1];
			}
			return "";
		}
		
		var qsLang=(function(){
			var scripts = document.getElementsByTagName("script"), script;
			for(var i=0;i<scripts.length;i++){
				script = scripts[i];
				var src = script.src;
				var idx = src.indexOf("gswidgets.js?");
				if (idx > 0) {
					return getQueryValue(src, "lang");
				}
			}
			return;
		})();
		
		/*var locale = (function(){
			var lng = navigator.languages? navigator.languages[0] : (navigator.language || navigator.userLanguage);
			var locale = typeof lng === "string" ? lng : [ lng.language, lng.region ].join( "-" );
			return locale;
		})();
		
		var lc = locale.toLowerCase();*/
		
		var lc = (qsLang||"zh-cn").toLowerCase();
		if(lc=="location"){
			qsLang = getQueryValue(window.location.href, "lang");
			lc = (qsLang||"zh-cn").toLowerCase();
		}
		var langPath;
		if(lc.indexOf("cn")>=0){
			langPath = '/widgets/i18n/lang.cn';
		}else if(lc.indexOf("tw")>=0){
			langPath = '/widgets/i18n/lang.tw';
		}else if(lc.indexOf("en")>=0){
			langPath = '/widgets/i18n/lang.en';
		}else if(lc.indexOf("ja")>=0){
			langPath = '/widgets/i18n/lang.ja';
		}else{
			langPath = '/widgets/i18n/lang.cn';
		}
		//"/sdk/help/locale/rq"
		helper.resourceName = function(name, ui, ver){
			return "gs_"+name+"_"+ui+"_"+ver;
		};
		helper.modulesPath = SDK.basePath+"/widgets/modules/";
		require.config((function(){
			var config = {};
			config.paths = {};
			config.paths["gs_lang"]=SDK.basePath+langPath;
			for(var libname in libs){
				if(!libs.hasOwnProperty(libname))continue;
				var lib = libs[libname];
				config.paths["gs_"+libname]=SDK.basePath+lib;
			}
			for(var ui in modules){
				if(!modules.hasOwnProperty(ui))continue;
				var vers = modules[ui];
				for(var ver in vers){
					if(!vers.hasOwnProperty(ver))continue;
					var cfg = vers[ver];
					if(cfg.wgs)
					for(var idx=0;idx<cfg.wgs.length;idx++){
						var wg = cfg.wgs[idx];
						var rn = helper.resourceName(wg, ui, ver);
						config.paths[rn]=helper.modulesPath+cfg.dir+"/"+wg+"/"+wg;
					}
				}
			}
			return config;
		})());
		
		helper.ui = function(md, ui){
			if(SDK.isEmpty(ui)){
				if(defaults[md]){
					return defaults[md][0];
				}else{
					return defaults["_default"][0];
				}
			}else{
				if(modules[ui]){
					return ui;
				}else{
					return helper.ui(md);
				}
			}
		};
		helper.version = function(md, ui, ver){
			ui = helper.ui(md, ui);
			if(modules[ui][ver]){
				return ver;
			}else{
				ver =  defaults["_default"][1][ui];
			}
			return ver;
		};
		helper.versionDir = function(ui, ver){
			return modules[ui][ver].dir;
		};
		helper.resourceDefine = function(md, ui, ver,theme){
			return SDK.isEmpty(theme) ? [helper.versionDir(ui, ver),md,md].join("/") : [helper.versionDir(ui, ver),md,theme].join("/");
		};
		return helper;
	})();
	
	var GsX = (function() {
		var That = {
			version:"0.1",
			options:{},
			basePath: SDK.basePath,//http://static.gensee.com/webcast/static/sdk/
			ctx:""//使用场景
		};
		That.widgets = {};
		That.widget = function(id){
			return That.widgets[id];
		};
		That.widgetsByType = function(type){
			var els = That.Util.getElementsByTagName(type);
			var wgs = [];
			if(els && els.length>=1){
				var wg;
				for(var i=0; i<els.length; i++){
					wg = That.widget($(els[i]).attr("id"));
					wgs.push(wg);
				}
			}else{
				SDK.log("GsX.widgetByType: can not find widget of '"+type+"'","WARN");
			}
			return wgs;
		};
		That.widgetsPath=That.basePath+"/widgets/";
		That.modulesPath = That.basePath+"/widgets/modules/";
		
		That.staticFullPrefix = (function(){
			var idx = That.basePath.indexOf("/static/sdk");
			if(idx>0){
				return That.basePath.substring(0, idx);
			}else{
				return "http://static.gensee.com/webcast";
			}
		}());
		var widgetMgr = (function(){
			this.proxy = function(tagName, tagElem, group){
				var wg = SDK.loadWidget(tagName, tagElem, group);
				var proxy = {};
				
				proxy.basic = {};
				proxy.user ={};
				wg.activeShakehand(function(data){
					if(typeof data === "string"){
						eval("data="+data);
					}
				    if(data.basic=="basic"){
				    	if(SDK.isNotEmpty(proxy.basic.name)){
				    		SDK.log("Basic widget must have only one","ERROR");
				    	}
				    	proxy.basic = data;
				    	proxy.user = {id:proxy.basic.uid,name:proxy.basic.uname,visible:proxy.basic.visible};
				    }
			    },'{"name":"'+tagName+'"}');
				
				
				proxy.id = wg.id;
				proxy.type = tagName;
				proxy.tagName = tagName;
				proxy.elem = tagElem;
				proxy.group = wg.group||group;
				proxy.send = function(type, data, cb){
					wg.send(type, data, cb);
				};
				proxy.bind = function(type, handler){
					wg.bind(type, handler);
				};
				proxy.SDK = SDK;
				
				//attrs
				proxy.attrs = {};
				proxy.attrs.titlebar = attr(proxy, "titlebar");
				proxy.attrs.version = attr(proxy, "ver");
				proxy.attrs.ui = attr(proxy, "ui");
                proxy.attrs.theme = attr(proxy,"theme");
				proxy.attrs.dataset = getDataSet(proxy.elem.attributes);
				$(proxy.elem).attr("id", proxy.id);
				
				proxy.moduleName = tagName.substring(tagName.indexOf("-")+1);
				proxy.ui = ConfigHelper.ui(proxy.moduleName,proxy.attrs.ui);
				proxy.version = ConfigHelper.version(proxy.moduleName, proxy.ui, proxy.attrs.version);
				proxy.versionDir = That.modulesPath+ConfigHelper.versionDir(proxy.ui, proxy.version);
                proxy.resourceDefine = That.modulesPath+ConfigHelper.resourceDefine(proxy.moduleName, proxy.ui, proxy.version);
                proxy.cssResourceDefine = SDK.isEmpty(proxy.attrs.theme) ? proxy.resourceDefine : That.modulesPath + ConfigHelper.resourceDefine(proxy.moduleName, proxy.ui, proxy.version, proxy.attrs.theme);
                proxy.theme = SDK.isEmpty(proxy.attrs.theme) ? "common" : proxy.attrs.theme;
				$(proxy.elem).addClass("gs-"+proxy.ui+"-"+proxy.version);
				
				(function(){
					var tk = $(proxy.elem).attr("takeover") || $(proxy.elem).attr("data-takeover");
					var takeovers = {};
					if(SDK.isNotEmpty(tk)){
						var tks = tk.split(",");
						for(var i=0;i<tks.length;i++){
							takeovers[tks[i]] = true;
						}
					}
					proxy.takeover = function(key, value){
						if(SDK.isNotEmpty(value)){
							takeovers = {};
							var vs = value.split(",");
							for(var i=0;i<vs.length;i++){
								takeovers[vs[i]] = true;
							}
						}
						return takeovers[key];
					};
					
					proxy._show = function(elem){
						$(elem).show();
					};
					proxy._hide = function(elem){
						$(elem).hide();
					};
					proxy.check = function(data){
						data = data || {wg:proxy, targetElem:proxy.elem};
						data.targetElem = data.targetElem || proxy.elem;
						return data;
					};
					if(proxy.attrs.dataset.hidemode=="visibility"){
						proxy._show = function(elem){
							$(elem).css({"visibility" : "visible"});
						};
						proxy._hide = function(elem){
							$(elem).css({"visibility" : "hidden"});
						};
					}
					proxy.toggle = function(data){
						data = proxy.check(data);
						if($(data.targetElem).css("visibility") == "hidden" || $(data.targetElem).css("display") == "none"){
							proxy.open(data);
						}else{
							proxy.close(data);
						}
					};
					proxy.open = function(data){
						data = proxy.check(data);
						if(!proxy.takeover("open")) {
							proxy._show(data.targetElem);
						}
						$(proxy.elem).trigger("open", data);
						
					};
					proxy.close = function(data){
						data = proxy.check(data);
						if(!proxy.takeover("close")) {
							proxy._hide(data.targetElem);
						}
						$(proxy.elem).trigger("close", data);
					};
				})();
				
				That.widgets[wg.id]=proxy;
				return proxy;
			};
			this.getDataSet = function(attributes) {  
				var hash = {};  
		        if (!attributes) return hash;  
		        for (var attribute, i = 0, j = attributes.length; i < j; i++) {  
		            attribute = attributes[i];  
		            if(attribute.nodeName.indexOf('data-') != -1){  
		                hash[attribute.nodeName.slice(5)] = attribute.value||attribute.nodeValue;  
		            }  
		        }  
		        return hash;  
		    };
			this.attr = function(proxy, name){
				var value = proxy.attrs[name];
				if(SDK.isNotEmpty(value))return value;
				try{
					value = proxy.elem.getAttribute(name);
					value = SDK.trim(value);
				}catch(e){
					SDK.log(".getAttribute(name) throw:"+e, "ERROR", this);
				}
				return SDK.isEmpty(value)?"":value;
			};
			return this;
		})();
		
		That.i18n = function(key){
			return key;
		};
		
		var cssLoaded = {};
		That.tagHandler=function(tagName, tagElem){
			if($(tagElem).hasClass("gs-sdk-plugin-widget")){
				return;
			}
			$(tagElem).addClass("gs-sdk-plugin-widget");
			if(tagName.substring(0,6)!="plugin"){
				SDK.log("TagName must start with \"plugin\"!","ERROR");
				return;
			}
			var wg = widgetMgr.proxy(tagName, tagElem, tagElem.getAttribute("group"));
			wg.ready = false;
			require([ConfigHelper.resourceName(wg.moduleName, wg.ui, wg.version), "gs_lang"], (function(wg){
				return function(Worker, i18n){
					if(i18n)That.i18n = i18n;
					setTimeout(function(){
						$(wg.elem).bind("ready", function(){
							wg.ready = true;
						});
						Worker.work(wg);
					});
				};
			})(wg));
			
			var cssPath = That.widgetsPath+"/modules/"+wg.ui+"/"+wg.version+"/"+wg.theme+".css";
			if(SDK.isEmpty(cssLoaded[cssPath])){
				cssLoaded[cssPath] = cssPath;
				That.Util.loadCss(cssPath);
			}
		};
		
		That.Util = {
			getElementsByTagName:function(tagName){
				return SDK.getElementsByTagName(tagName);
			},
			isIE:function(){
				return navigator.appName == "Microsoft Internet Explorer";
			},
			lang:function(){
				return this.isIE()?navigator.browserLanguage.toLowerCase():navigator.language.toLowerCase();
			},
			checkTime:function(num){
				var n = Number(num);
				if(n<10)n = "0"+n;
				return n;
			},
			trim : function(str) {
				return SDK.trim(str);
			},
			isEmpty : function(obj) {
				return SDK.isEmpty(obj);
			},
			isNotEmpty : function(obj) {
				return !this.isEmpty(obj);
			},
			breachHTML:function(str){
				if(typeof str !== "string" || this.isEmpty(str))return str;
				return str.replace(/\</g,"&lt;");
			},
			escapeHTML:function(str){
				if(typeof str !== "string" || this.isEmpty(str))return str;
				return str.replace(/\&/g,"&amp;").replace(/\</g,"&lt;");
			},
			currentTime : function() {
				return this.formatDate(new Date());
			},
			calcPercent : function(value, total) {
				if (isNaN(value) || Number(value) == 0)
					return "0";
				if (isNaN(total) || Number(total) == 0)
					return "0";
				return Math.round(Number(value) * 100 / Number(total));
			},
			round : function(number, fractionDigits) {
				fractionDigits = fractionDigits || 2;
				with (Math) {
					return round(number * pow(10, fractionDigits)) / pow(10, fractionDigits);
				}
			},
			timeDuration : function(second, showhour) {
				if (isNaN(second) || second == 0)
					return showhour?"00:00:00":"00:00";
				second = parseInt(second);
				var time = '';
				var hour = second / 3600 | 0;
				if (hour != 0 || showhour) {
					time += this.checkTime(hour) + ':';
				}
				var min = (second % 3600) / 60 | 0;
				time += this.checkTime(min) + ':';
				var sec = (second - hour * 3600 - min * 60) | 0;
				time += this.checkTime(sec);
				return time;
			},
			formatDate : function(date) {
				var h = date.getHours();
				var m = date.getMinutes();
				var s = date.getSeconds();
				return this.checkTime(h) + ":" + this.checkTime(m) + ":" + this.checkTime(s);
			},
			formatTime : function(time) {
				var date = new Date();
				date.setTime(time);
				var h = date.getHours();
				var m = date.getMinutes();
				var s = date.getSeconds();
				return this.checkTime(h) + ":" + this.checkTime(m) + ":" + this.checkTime(s);
			},
			formatYMD : function(time) {
				var date = new Date();
				date.setTime(time);
				var y = date.getFullYear();
				var m = date.getMonth() + 1;
				var d = date.getDate();
				return y + "-" + this.checkTime(m) + "-" + this.checkTime(d);
			},
			formatText : function(text) {
				text = text.replace(" ", "&nbsp;");
				text = text.replace(/\n/g, "<br/>");
				return text;
			},
            formatUrl:function(content){
            	if(this.isEmpty(content)){
            		return content;
            	}
                var reg = /(?:<img.+?>)|(http[s]?|(www\.)){1}[\w\.\/\?=%&@:#;\*\$\[\]\(\){}'"\-]+([0-9a-zA-Z\/#])+?/ig,
                    content = content.replace(reg, function(content) {
                        if(/<img.+?/ig.test(content)){
                            return content;
                        }else{
                            return '<a class="msg-url" target="_blank" href="'+content.replace(/^www\./i,function(content){
                                return "http://" + content;
                            })+'">'+content+'</a>'
                        }
                    });
                return content;
            },
			//占位符替换
			replaceholder : function(str, values) {
				return str.replace(/\{(\d+)\}/g, function(m, i) {
					return values[i];
				});
			},
			loadCss:function(url) {
			    var link = document.createElement("link");
			    link.type = "text/css";
			    link.rel = "stylesheet";
			    link.href = url;
			    document.getElementsByTagName("head")[0].appendChild(link);
			}				
		};
		return That;
	})();
	
	$.fn.extend({"wgdata":function(key, value){
		if(value === undefined){
			return $(this).data(key);
		}
		
		var id = $(this).attr("id");
		var wg = GsX.widget(id);
		
		if(key === "takeover"){
			wg.takeover(key, value);
			return;
		}

		return wg && wg.wgdata && wg.wgdata(key, value);
	}});
	
	GsX.autoload = true;
	SDK.onDomReady(function(){
		if(GsX.autoload)GsX.loadAllTags();
	});
	GsX.loadAllTags = function(){
		var tags = [];
		if(ConfigHelper.all)
		for(var idx=0; idx< ConfigHelper.all.length;idx++){
			var tag = ConfigHelper.all[idx];
			tags.push("plugin-"+tag);
		}
		SDK.loadSDKTags();
		SDK.loadTags(tags, GsX.tagHandler);
	};
	GsX.loadTag = function(tagName, tagElem){
		if("[video-live],[video-vod],[audio-live],[audio-vod],[doc]".indexOf("["+tagName+"]")>=0){
			return GS.loadTag(tagName, tagElem);
		}else{
			return GsX.tagHandler(tagName, tagElem);
		}
	};
	GsX.config = function(config){
		if(GsX.Util.isEmpty(config))return;
	};
	
	GsX.getTmpl = function(data){
		data.dataType = "text";
		$.ajax(data);
	};
	
	/*
	 * flash plugin
	 */
	if(GsX.Util.isIE()){
		GsX.flashready = function(){
			GsX.bflashready = true;
			SDK.log("[GsX flash api]["+new Date().getTime()+"] curl flash ready!", "INFO");
		};
		GsX.cbno=0;
		GsX.cbs = {};
		GsX.flashfail = function(data){
			SDK.log("[GsX flash api] An exception occurred processing getURL:"+data, "ERROR", data);
		};
		
		var flashPluginId = "_GS_flash_GsX_tmpl_helper";
		var flashPlugin =
			'<div style="width:0px; height:0px;"> \
			<object id="'+flashPluginId+'" width="0" height="0" type="application/x-shockwave-flash"\
				codebase="https://fpdownload.macromedia.com/get/flashplayer/current/swflash.cab#version=10.0.12.36" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000">	\
			<param name="movie" value="'+GsX.basePath+'/widgets/core/curl.swf?0918" />	\
			<param name="allowscriptaccess" value="always">\
			<embed src="'+GsX.basePath+'/widgets/core/curl.swf?0918" width="100%" height="100%" name="'+flashPluginId+'" allowScriptAccess="always" type="application/x-shockwave-flash"	\
			pluginspage="http://www.adobe.com/go/getflashplayer">	\
			</embed></object></div>';

		$(function(){
			$("body").append(flashPlugin);
		});
		
		GsX.getTmpl = function(data, tri){
			var fl = GS._in_.getFlashObj(flashPluginId);
			var key = "fn_"+new Date().getTime()+"_"+(GsX.cbno++);
			GsX.cbs[key]=function(result){
				data.success(result);
				SDK.log("[GsX flash api]["+new Date().getTime()+"] callback success for "+data.url, "INFO", data);
			};
			if(GsX.bflashready===true){
				try{
					fl.getURL(data.url, "GS._GsX_.cbs."+key, "GsX.flashfail");
				}catch(e){
					SDK.log("[GsX flash api]["+new Date().getTime()+"] callback fail for "+data.url, "ERROR", e);
				}
			}else if(tri){
				try{
					fl.getURL(data.url, "GS._GsX_.cbs."+key, "GsX.flashfail");
					GsX.bflashready=true;
				}catch(e){
					GsX.getTmpl(data);
				}
			}else{
				setTimeout(function(){
					if(GsX.cbno>37){
						console.log("系统加载错误，请刷新重新尝试！");
						throw "[GsX flash api]["+new Date().getTime()+"] flash load timeout!";
					}
					if(GsX.cbno%5==0){
						GsX.getTmpl(data, true);
					}else{
						GsX.getTmpl(data);
					}
				}, 300);
			}
			
		};
	}
	GS._GsX_ = GsX;
})( this );


