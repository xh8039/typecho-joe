class ThemeManager {
	constructor() {
		// 监听系统主题变化
		this.systemQuery = window.matchMedia('(prefers-color-scheme: dark)');
		this.systemQuery.addEventListener('change', this.handleSystemChange);
		this.handleSystemChange();
		const isDarkBody = document.body.classList.contains('dark-theme');
		document.querySelector('meta[name="theme-color"]').setAttribute('content', isDarkBody ? '#2F3135' : '#FDFCFE');
	}

	handleSystemChange = () => {
		const isDarkBody = document.body.classList.contains('dark-theme');
		// 系统主题与页面不一致时，触发切换
		if (this.systemQuery.matches !== isDarkBody) this.toggle();

	}

	// 触发主题切换按钮的点击事件（所有切换逻辑由原有代码处理）
	toggle() {
		document.querySelector('.toggle-theme')?.click()
	}

	// 销毁监听器（用于单页应用清理）
	destroy() {
		this.systemQuery.removeEventListener('change', this.handleSystemChange);
	}
}
