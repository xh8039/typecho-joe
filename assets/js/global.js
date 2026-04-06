document.addEventListener('DOMContentLoaded', () => {
	/** 自定义网站字体 */
	(() => {
		if (!_win.options.JCustomFont) return;
		if (_win.options.JCustomFont.includes('||')) {
			const JCustomFont = _win.options.JCustomFont.split('||').map(item => item.trim());
			Joe.loadCss(JCustomFont[0], () => {
				const css = `html body {font-family: '${JCustomFont[1]}'}`;
				const style = document.createElement('style');
				style.innerHTML = css;
				document.head.appendChild(style);
			});
		} else {
			const css = `@font-face {font-family: 'Joe Font';font-weight: normal;font-style: normal;font-display: swap;src: url('${_win.options.JCustomFont}');} body {font-family: 'Joe Font'}`;
			const style = document.createElement('style');
			style.innerHTML = css;
			document.head.appendChild(style);
		}
	})();

	/** 反机器人评论机制 */
	(() => {
		if (!_win.options.commentsAntiSpam) return;
		const forms = document.getElementsByClassName(_win.options.respondId);
		if (forms.length <= 0) return;
		const input = document.createElement('input');
		input.type = 'hidden';
		input.name = '_';
		input.value = _win.options.commentsAntiSpam;
		// console.log(forms[0]);
		forms[0].appendChild(input);
	})();

	/** 初始化当前在线人数 */
	(() => {
		const dom = '.online-users-count';
		if (!document.querySelector(dom)) return;
		const online = () => {
			if (!document.querySelector(dom)) return;
			$.get(_win.ajax_url + 'online', (data, status) => {
				if (status != 'success' || data.count == undefined) {
					document.querySelector(dom).parentElement.remove();
					return;
				}
				document.querySelector(dom).innerText = data.count;
			}, 'json');
		};
		online();
		setInterval(online, (Joe.options.JOnLineCountThreshold || 30) * 1000);
	})();

	if (Joe.options.JDocumentTitle) {
		const TITLE = document.title;
		document.addEventListener("visibilitychange", () => {
			if (document.visibilityState === "hidden") {
				document.title = Joe.options.JDocumentTitle;
			} else {
				document.title = TITLE;
			}
		});
	}

	/* 动态背景 */
	if (Joe.options.DynamicBackground != 'off') {
		if (Joe.IS_MOBILE && !Joe.options.JWallpaper_Background_WAP) {
			$.getScript(`${Joe.options.themeUrl}/assets/plugin/backdrop/${Joe.options.DynamicBackground}`);
		}
		if (!Joe.IS_MOBILE && !Joe.options.JWallpaper_Background_PC) {
			$.getScript(`${Joe.options.themeUrl}/assets/plugin/backdrop/${Joe.options.DynamicBackground}`);
		}
	}
}, { once: true });