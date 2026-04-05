window.Joe.loadCss = (url, callback = function () { }) => {
	window.Joe.loadCssList = window.Joe.loadCssList ? window.Joe.loadCssList : {};
	if (!Joe.loadCssList[url]) {
		let link = document.createElement('link');
		link.async = true;
		link.rel = 'stylesheet';
		link.addEventListener('load', callback);
		link.href = url;
		document.head.appendChild(link);
		Joe.loadCssList[url] = link;
	} else {
		callback();
	}
}

window.Joe.thumbnailError = (element, thumb = `${Joe.options.themeUrl}/assets/img/thumbnail.svg`) => {
	if (element.dataset.thumbnailLoaded) return true
	console.log('缩略图加载失败', element, element.src);
	// const thumb = `${Joe.options.themeUrl}/assets/img/thumbnail.svg`;
	element.dataset.src = thumb;
	element.src = thumb;
	element.dataset.thumbnailLoaded = true;
}
