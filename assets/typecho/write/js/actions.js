class JoeAction {
	constructor() {
		$('body').append(`
				<div class="cm-modal">
						<div class="cm-modal__wrapper">
								<div class="cm-modal__wrapper-header">
										<div class="cm-modal__wrapper-header--text"></div>
										<div class="cm-modal__wrapper-header--close">×</div>
								</div>
								<div class="cm-modal__wrapper-bodyer"></div>
								<div class="cm-modal__wrapper-footer">
										<button class="cm-modal__wrapper-footer--cancle">取消</button>
										<button class="cm-modal__wrapper-footer--confirm">确定</button>
								</div>
						</div>
				</div>
		`);
		$('.cm-modal__wrapper-footer--cancle, .cm-modal__wrapper-header--close').on('click', () => $('.cm-modal').removeClass('active'));
		$('.cm-modal__wrapper-footer--confirm').on('click', () => {
			this.options.confirm();
			$('.cm-modal').removeClass('active');
		});
	}
	_openModal(options = {}) {
		const _options = {
			title: '提示',
			innerHtml: '内容',
			hasFooter: true,
			confirm: () => { },
			handler: () => { }
		};
		this.options = Object.assign(_options, options);
		$('.cm-modal__wrapper-header--text').html(this.options.title);
		$('.cm-modal__wrapper-bodyer').html(this.options.innerHtml);
		this.options.hasFooter ? $('.cm-modal__wrapper-footer').show() : $('.cm-modal__wrapper-footer').hide();
		$('.cm-modal').addClass('active');
		this.options.handler();
	}
	_getLineCh(cm) {
		const head = cm.state.selection.main.head;
		const line = cm.state.doc.lineAt(head);
		return head - line.from;
	}
	_replaceSelection(cm, str) {
		cm.dispatch(cm.state.replaceSelection(str));
	}
	_setCursor(cm, pos) {
		cm.dispatch({ selection: { anchor: pos } });
	}
	_getSelection(cm) {
		return cm.state.sliceDoc(cm.state.selection.main.from, cm.state.selection.main.to);
	}
	_insetAmboText(cm, startStr, endStr = null) {
		const cursor = cm.state.selection.main.head;
		const selection = this._getSelection(cm);
		endStr = endStr ? endStr : startStr;
		this._replaceSelection(cm, `${startStr + (selection ? selection : '文字') + endStr}`);
		if (selection === '') this._setCursor(cm, cursor + startStr.length + endStr.length + '文字'.length + 1);
		cm.focus();
	}
	_createTableLists(cm, url, activeTab = '', modalTitle) {
		const loading = layer.load(2, { shade: 0.3 });
		$.ajax({
			url,
			dataType: 'json',
			success: res => {
				let tabbarStr = '';
				let listsStr = '';
				for (let key in res) {
					const arr = res[key].split(' ');
					tabbarStr += `<div class="tabbar-item ${key === activeTab ? 'active' : ''}" data-show="${key}">${key}</div>`;
					listsStr += `<div class="lists ${key === activeTab ? 'active' : ''}" data-show="${key}">${arr.map(item => `<div class="lists-item" data-text="${item}">${item}</div>`).join(' ')}</div>`;
				}
				layer.close(loading);
				this._openModal({
					title: modalTitle,
					hasFooter: false,
					innerHtml: `<div class="tabbar">${tabbarStr}</div>${listsStr}`,
					handler: () => {
						$('.cm-modal__wrapper-bodyer .tabbar-item').on('click', function () {
							const activeTab = $(this);
							const show = activeTab.attr('data-show');
							const tabbar = $('.cm-modal__wrapper-bodyer .tabbar');
							activeTab.addClass('active').siblings().removeClass('active');
							tabbar.stop().animate({
								scrollLeft: activeTab[0].offsetLeft - tabbar[0].offsetWidth / 2 + activeTab[0].offsetWidth / 2 - 15
							});
							$('.cm-modal__wrapper-bodyer .lists').removeClass('active');
							$(".cm-modal__wrapper-bodyer .lists[data-show='" + show + "']").addClass('active');
						});
						const _this = this;
						$('.cm-modal__wrapper-bodyer .lists-item').on('click', function () {
							const text = $(this).attr('data-text');
							_this._replaceSelection(cm, `${text}`);
							$('.cm-modal').removeClass('active');
							cm.focus();
						});
					}
				});
			}
		});
	}
	_updateScroller(el, target) {
		const percentage = el.scrollTop / (el.scrollHeight - el.offsetHeight);
		target.scrollTop = percentage * (target.scrollHeight - target.offsetHeight);
	}
	handleFullScreen(el) {
		el.toggleClass('active');
		$('body').toggleClass('fullscreen');
		$('.cm-container').toggleClass('fullscreen');
		$('.cm-preview').width(0);
	}
	handlePublish() {
		$('#btn-submit').click();
	}
	handleUndo(cm) {
		CodeMirror.undo(cm);
		cm.focus();
	}
	handleRedo(cm) {
		CodeMirror.redo(cm);
		cm.focus();
	}
	handleIndent(cm) {
		this._replaceSelection(cm, '　');
		cm.focus();
	}
	handleTime(cm) {
		const time = new Date();
		const _Year = time.getFullYear();
		const _Month = String(time.getMonth() + 1).padStart(2, 0);
		const _Date = String(time.getDate()).padStart(2, 0);
		const _Hours = String(time.getHours()).padStart(2, 0);
		const _Minutes = String(time.getMinutes()).padStart(2, 0);
		const _Seconds = String(time.getSeconds()).padStart(2, 0);
		const _Day = ['星期日', '星期一', '星期二', '星期三', '星期四', '星期五', '星期六'][time.getDay()];
		const _time = `${_Year}-${_Month}-${_Date} ${_Hours}:${_Minutes}:${_Seconds} ${_Day}`;
		this._replaceSelection(cm, _time);
		cm.focus();
	}
	handleHr(cm) {
		const str = `${this._getLineCh(cm) ? '\n' : ''}\n------------\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleFormat(cm) {
		this.beautifyCode(cm, 'markdown');
	}
	/**
	* 使用Prettier美化代码。
	*
	* @param {string} parser parser 要使用的解析器 (例如，"javascript"，"php")。默认为与 language 参数相同的值。
	* @param {string} language language 用于构建附加插件 URL 的语言 (可选，默认为 parser)。
	*/
	beautifyCode(cm, parser, language = null) {
		language = language || parser;
		const code = cm.state.doc.toString();
		if (!code || code.trim().length === 0) return;

		let pluginUrl = "https://unpkg.com/prettier@2.2.1/parser-" + language + ".js";
		if (parser == "php") pluginUrl = "https://unpkg.com/@prettier/plugin-php@0.15.1/standalone.js";

		this.loadFiles(["https://unpkg.com/prettier@2.2.1/standalone.js", pluginUrl]).then(() => {
			try {
				let formattedCode = prettier.format(code, {
					parser: parser,
					plugins: prettierPlugins,
				});
				if (formattedCode) {
					if (formattedCode == code) {
						layer.msg('无需格式化');
					} else {
						cm.dispatch({ changes: { from: 0, to: cm.state.doc.length, insert: formattedCode } });
						cm.focus();
					}
				} else {
					layer.alert('格式化后的结果为空');
				}
			} catch (error) {
				layer.alert('格式化失败');
				console.error("Prettier formatting error:", error.message); // 使用 console.error 来记录错误
			}
		});
	}
	/**
	 * 并发加载多个文件。处理 .js 和其他文件类型（可能是通过链接标签加载的 CSS）。
	 * @param {string[]} fileUrls 要加载的文件 URL 数组。
	 * @returns {Promise<void>} 所有文件加载完成后解析的 Promise。
	 */
	loadFiles(fileUrls) {
		const loading = layer.load(2, { shade: 0.3 });

		const fileLoader = new FileLoader();

		// 只添加尚未加载的文件
		fileUrls.forEach(fileUrl => {
			// 检查脚本是否已加载
			if (!FileLoader.isScriptLoaded(fileUrl)) fileLoader.add(fileUrl);
		});

		// 返回一个 Promise，在所有文件加载完成后解析
		return fileLoader.loaded().then(() => {
			console.log("加载完成");
			layer.close(loading);
		});
	}
	handleHtmlToMarkdown(CodeMirror) {
		const code = CodeMirror.state.doc.toString();
		if (!code || code.trim().length === 0) return;
		this.loadFiles([Joe.CDN_URL + 'turndown/7.2.0/turndown.min.js']).then(() => {
			try {
				let HtmlToMarkdown = (new TurndownService({
					headingStyle: 'atx', // 标题样式
					hr: '---', // hr样式
					bulletListMarker: '-', // 无序列表样式
					codeBlockStyle: 'fenced', // 代码块样式
					emDelimiter: '*', // 斜体样式
				})).turndown(code);
				if (HtmlToMarkdown) {
					if (HtmlToMarkdown == code) {
						layer.msg('无需转换');
					} else {
						CodeMirror.dispatch({ changes: { from: 0, to: CodeMirror.state.doc.length, insert: HtmlToMarkdown } });
						CodeMirror.focus();
					}
				} else {
					layer.alert('HTML 转 Markdown 的结果未空');
				}
			} catch (error) {
				layer.alert('HTML 转 Markdown 失败');
				console.error("HTML 转 Markdown 错误：", error.message); // 使用 console.error 来记录错误
			}
		});
	}
	handleClean(cm) {
		if (!window.confirm('确定要清屏吗？')) return;
		cm.dispatch({ changes: { from: 0, to: cm.state.doc.length, insert: '' } });
		cm.focus();
	}
	handleOrdered(cm) {
		const selection = this._getSelection(cm);
		if (selection === '') {
			const str = (this._getLineCh(cm) ? '\n\n' : '') + '1. ';
			this._replaceSelection(cm, str);
		} else {
			const selectionText = selection.split('\n');
			for (let i = 0, len = selectionText.length; i < len; i++) {
				selectionText[i] = selectionText[i] === '' ? '' : i + 1 + '. ' + selectionText[i];
			}
			const str = (this._getLineCh(cm) ? '\n' : '') + selectionText.join('\n');
			this._replaceSelection(cm, str);
		}
		cm.focus();
	}
	handleUnordered(cm) {
		const selection = this._getSelection(cm);
		if (selection === '') {
			const str = (this._getLineCh(cm) ? '\n' : '') + '- ';
			this._replaceSelection(cm, str);
		} else {
			const selectionText = selection.split('\n');
			for (let i = 0, len = selectionText.length; i < len; i++) {
				selectionText[i] = selectionText[i] === '' ? '' : '- ' + selectionText[i];
			}
			const str = (this._getLineCh(cm) ? '\n' : '') + selectionText.join('\n');
			this._replaceSelection(cm, str);
		}
		cm.focus();
	}
	handleQuote(cm) {
		const selection = this._getSelection(cm);
		if (selection === '') {
			this._replaceSelection(cm, `${this._getLineCh(cm) ? '\n' : ''}> `);
		} else {
			const selectionText = selection.split('\n');
			for (let i = 0, len = selectionText.length; i < len; i++) {
				selectionText[i] = selectionText[i] === '' ? '' : '> ' + selectionText[i];
			}
			const str = (this._getLineCh(cm) ? '\n' : '') + selectionText.join('\n');
			this._replaceSelection(cm, str);
		}
		cm.focus();
	}
	handleDownload(cm) {
		const title = $('#title').val() || '新文章';
		const aTag = document.createElement('a');
		let blob = new Blob([cm.state.doc.toString()]);
		aTag.download = title + '.md';
		aTag.href = URL.createObjectURL(blob);
		aTag.click();
		URL.revokeObjectURL(blob);
	}
	handleTitle(cm, tool) {
		const item = $(`
			<div class="cm-tools-item" data-toggle="tooltip" data-placement="auto top" title="${tool.title}">
				${tool.innerHTML}
				<div class="cm-tools__dropdown">
					<div class="cm-tools__dropdown-item" data-text="# "> H1 </div>
					<div class="cm-tools__dropdown-item" data-text="## "> H2 </div>
					<div class="cm-tools__dropdown-item" data-text="### "> H3 </div>
					<div class="cm-tools__dropdown-item" data-text="#### "> H4 </div>
					<div class="cm-tools__dropdown-item" data-text="##### "> H5 </div>
					<div class="cm-tools__dropdown-item" data-text="###### "> H6 </div>
				</div>
			</div>
		`);
		item.on('click', function (e) {
			e.stopPropagation();
			$(this).toggleClass('active');
		});
		const _this = this;
		item.on('click', '.cm-tools__dropdown-item', function (e) {
			e.stopPropagation();
			const text = $(this).attr('data-text');
			if (_this._getLineCh(cm)) _this._replaceSelection(cm, '\n\n' + text);
			else _this._replaceSelection(cm, text);
			item.removeClass('active');
			cm.focus();
		});
		$(document).on('click', () => item.removeClass('active'));
		$('.cm-tools').append(item);
	}
	handleLink(cm) {
		this._openModal({
			title: '插入链接',
			innerHtml: `
				<div class="fitem">
					<label>链接标题</label>
					<input autocomplete="off" name="title" placeholder="请输入链接标题"/>
				</div>
				<div class="fitem">
					<label>链接地址</label>
					<input autocomplete="off" name="url" placeholder="请输入链接地址"/>
				</div>
			`,
			confirm: () => {
				const title = $(".cm-modal input[name='title']").val().trim();
				const url = $(".cm-modal input[name='url']").val().trim() || 'http://';
				const text = title ? `[${title}](${url})` : `<${url}>`;
				this._replaceSelection(cm, text);
				cm.focus();
			}
		});
	}
	handleZibllQuote(cm) {
		this._openModal({
			title: '引言',
			innerHtml: `
				<div class="fitem">
					<label>引言颜色</label>
					<input autocomplete="off" value="#555" name="color" type="color"/>
				</div>
				<div class="fitem">
					<label>引言内容</label>
					<input autocomplete="off" name="text" placeholder="请输入引言内容"/>
				</div>
			`,
			confirm: () => {
				const color = $(".cm-modal input[name='color']").val().trim();
				const text = $(".cm-modal input[name='text']").val().trim();
				this._replaceSelection(cm, `\n{quote color="${color}"}\n${text}\n{/quote}\n`);
				cm.focus();
			}
		});
	}
	handleImage(cm) {
		this._openModal({
			title: '插入图片',
			innerHtml: `
				<div class="fitem">
					<label>图片名称</label>
					<input autocomplete="off" name="title" placeholder="请输入图片名称"/>
				</div>
				<div class="fitem">
					<label>图片地址</label>
					<input autocomplete="off" name="url" placeholder="请输入图片地址"/>
				</div>
			`,
			confirm: () => {
				const title = $(".cm-modal input[name='title']").val().trim() || '图片';
				const url = $(".cm-modal input[name='url']").val().trim() || 'http://';
				this._replaceSelection(cm, `![${title}](${url})`);
				cm.focus();
			}
		});
	}
	handleTable(cm) {
		this._openModal({
			title: '插入表格',
			innerHtml: `
				<div class="fitem">
					<label>表格行</label>
					<input value="3" autocomplete="off" name="row"/>
				</div>
				<div class="fitem">
					<label>表格列</label>
					<input value="3" autocomplete="off" name="column"/>
				</div>
			`,
			confirm: () => {
				let row = $(".cm-modal input[name='row']").val();
				let column = $(".cm-modal input[name='column']").val();
				if (isNaN(row)) row = 3;
				if (isNaN(column)) column = 3;
				let rowStr = '';
				let rangeStr = '';
				let columnlStr = '';
				for (let i = 0; i < column; i++) {
					rowStr += '| 表头 ';
					rangeStr += '| :--: ';
				}
				for (let i = 0; i < row; i++) {
					for (let j = 0; j < column; j++) columnlStr += '| 表格 ';
					columnlStr += '|\n';
				}
				const htmlStr = `${rowStr}|\n${rangeStr}|\n${columnlStr}\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n\n' + htmlStr);
				else this._replaceSelection(cm, htmlStr);
				cm.focus();
			}
		});
	}
	handleGird(cm) {
		this._openModal({
			title: '插入宫格',
			innerHtml: `
				<div class="fitem">
					<label>宫格列数</label>
					<input value="3" autocomplete="off" name="column" placeholder="请输入宫格列数"/>
				</div>
				<div class="fitem">
					<label>宫格间隔</label>
					<input value="15" autocomplete="off" name="gap" placeholder="请输入宫格间隔"/>
				</div>
			`,
			confirm: () => {
				const column = $(".cm-modal input[name='column']").val();
				const gap = $(".cm-modal input[name='gap']").val();
				let htmlStr = '';
				for (let index = 1; index <= column; index++) {
					htmlStr += `\n{gird-item}\n宫格内容${index}\n{/gird-item}`;
				}
				htmlStr = `{gird column="${column}" gap="${gap}"}${htmlStr}\n{/gird}`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n\n' + htmlStr);
				else this._replaceSelection(cm, htmlStr);
				cm.focus();
			}
		});
	}
	handleCodeBlock(cm) {
		const language = 'rss+atom+ssml+mathml+svg+html+markup+css+clike+javascript+abap+abnf+actionscript+ada+agda+al+antlr4+apacheconf+apex+apl+applescript+aql+arduino+arff+asciidoc+aspnet+asm6502+autohotkey+autoit+bash+basic+batch+bbcode+birb+bison+bnf+brainfuck+brightscript+bro+bsl+c+csharp+cpp+cfscript+chaiscript+cil+clojure+cmake+cobol+coffeescript+concurnas+csp+coq+crystal+css-extras+csv+cypher+d+dart+dataweave+dax+dhall+diff+django+dns-zone-file+docker+dot+ebnf+editorconfig+eiffel+ejs+elixir+elm+etlua+erb+erlang+excel-formula+fsharp+factor+false+firestore-security-rules+flow+fortran+ftl+gml+gcode+gdscript+gedcom+gherkin+git+glsl+go+graphql+groovy+haml+handlebars+haskell+haxe+hcl+hlsl+http+hpkp+hsts+ichigojam+icon+icu-message-format+idris+ignore+inform7+ini+io+j+java+javadoc+javadoclike+javastacktrace+jexl+jolie+jq+jsdoc+js-extras+json+json5+jsonp+jsstacktrace+js-templates+julia+keyman+kotlin+kumir+latex+latte+less+lilypond+liquid+lisp+livescript+llvm+log+lolcode+lua+makefile+markdown+markup-templating+matlab+mel+mizar+mongodb+monkey+moonscript+n1ql+n4js+nand2tetris-hdl+naniscript+nasm+neon+nevod+nginx+nim+nix+nsis+objectivec+ocaml+opencl+openqasm+oz+parigp+parser+pascal+pascaligo+psl+pcaxis+peoplecode+perl+php+phpdoc+php-extras+plsql+powerquery+powershell+processing+prolog+promql+properties+protobuf+pug+puppet+pure+purebasic+purescript+python+qsharp+q+qml+qore+r+racket+jsx+tsx+reason+regex+rego+renpy+rest+rip+roboconf+robotframework+ruby+rust+sas+sass+scss+scala+scheme+shell-session+smali+smalltalk+smarty+sml+solidity+solution-file+soy+sparql+splunk-spl+sqf+sql+squirrel+stan+iecst+stylus+swift+t4-templating+t4-cs+t4-vb+tap+tcl+tt2+textile+toml+turtle+twig+typescript+typoscript+unrealscript+uri+v+vala+vbnet+velocity+verilog+vhdl+vim+visual-basic+warpscript+wasm+wiki+xeora+xml-doc+xojo+xquery+yaml+yang+zig';
		const languageArr = language.split('+').sort((a, b) => a.localeCompare(b));
		const sessionStorageType = sessionStorage.getItem('selectType') || '';
		let htmlStr = '';
		languageArr.forEach(item => {
			htmlStr += `<option ${sessionStorageType === item ? 'selected' : ''} value="${item}">${item}</option>`;
		});
		this._openModal({
			title: '插入代码块',
			innerHtml: `
				<div class="fitem">
					<label>语言类型</label>
					<select name="type">
						<option value="">- 请选择语言类型 -</option>
						${htmlStr}
					</select>
				</div>
			`,
			confirm: () => {
				const type = $(".cm-modal select[name='type']").val();
				if (!type) return;
				const htmlStr = `\`\`\`${type}\ncode here...\n\`\`\``;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n\n' + htmlStr);
				else this._replaceSelection(cm, htmlStr);
				cm.focus();
				sessionStorage.setItem('selectType', type);
			}
		});
	}
	handleAbout() {
		this._openModal({
			title: '关于',
			hasFooter: false,
			innerHtml: `
				<ul style="list-style:none;padding: 0;">
					<li>短代码功能正在开发中...</li>
					<li>仅支持网络图片粘贴上传（截图等）</li>
					<li><a href="http://blog.yihang.info/archives/436.html" target="_blank">查看 Markdown 语法教程</a></li>
					<li>本编辑器仅供Joe主题使用，未经允许不得移植至其他主题！</li>
				</ul>
			`
		});
	}
	handleTask(cm, type) {
		const str = type ? '{todo status="1" /}' : '{todo status="0" /}';
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleNetease(cm, type) {
		this._openModal({
			title: type ? '网易云歌单' : '网易云单首',
			innerHtml: `
				<div class="fitem">
					<label>歌${type ? '单' : '曲'}　ID</label>
					<input autocomplete="off" name="id" placeholder="请输入歌${type ? '单' : '曲'}ID"/>
				</div>
				<div class="fitem">
					<label>主题颜色</label>
					<input autocomplete="off" name="color" type="color" value="#409eff"/>
				</div>
				<div class="fitem">
					<label>自动播放</label>
					<select name="autoplay">
						<option value="1">是</option>
						<option value="0" selected>否</option>
					</select>
				</div>
				<div class="fitem">
					<label>循环播放</label>
					<select name="loop">
						<option value="none" selected>不循环</option>
						<option value="one">循环一次</option>
						<option value="all">始终循环</option>
					</select>
				</div>
				<div class="fitem">
					<label>播放顺序</label>
					<select name="order">
						<option value="list" selected>列表循环</option>
						<option value="random">随机循环</option>
					</select>
				</div>
				<div class="fitem">
					<label>播放记忆</label>
					<select name="storage" value="${type ? '1' : '0'}">
						<option value="1">是</option>
						<option value="0">否</option>
					</select>
				</div>
				<div class="fitem">
					<label>自动主题色</label>
					<select name="autotheme">
						<option value="1" selected>是</option>
						<option value="0">否</option>
					</select>
				</div>
			`,
			confirm: () => {
				const id = $(".cm-modal input[name='id']").val();
				const color = $(".cm-modal input[name='color']").val();
				const autoplay = $(".cm-modal select[name='autoplay']").val();
				const loop = $(".cm-modal select[name='loop']").val();
				const storage = $(".cm-modal select[name='storage']").val();
				const order = $(".cm-modal select[name='order']").val();
				const autotheme = $(".cm-modal select[name='autotheme']").val();
				const str = `\n{${type ? 'music-list' : 'music'} id="${id}" loop="${loop}" order="${order}" color="${color}" autoplay="${autoplay}" storage="${storage}" autotheme="${autotheme}"/}\n\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleBilibili(cm) {
		this._openModal({
			title: 'BiliBili视频',
			innerHtml: `
				<div class="fitem">
					<label>视频Bvid</label>
					<input autocomplete="off" name="bvid" placeholder="请输入视频Bvid"/>
				</div>
				<div class="fitem">
					<label>视频选集</label>
					<input autocomplete="off" name="page" placeholder="请输入视频选集"/>
				</div>
			`,
			confirm: () => {
				const bvid = $(".cm-modal input[name='bvid']").val();
				const page = $(".cm-modal input[name='page']").val();
				const str = `\n{bilibili bvid="${bvid}" page="${page}"/}\n\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleFeature(codeMirror) {
		this._openModal({
			title: '亮点',
			innerHtml: `
			<div class="fitem">
				<label>亮点图标</label>
				<input autocomplete="off" name="icon" placeholder="请输入fa图标，例：fa-download"/>
			</div>
			<div class="fitem">
				<label>图标大全</label>
				<a href="https://fontawesome.dashgame.com" target="_blank">fontawesome.dashgame.com</a>
			</div>
			<div class="fitem">
				<label>图标颜色</label>
				<input autocomplete="off" name="icon-color" type="color" value="#fffffe"/>
			</div>
			<div class="fitem">
				<label>亮点标题</label>
				<input autocomplete="off" name="title" type="text" placeholder="请输入亮点标题"/>
			</div>
			<div class="fitem" style="align-items: flex-start">
				<label>亮点简介</label>
				<textarea autocomplete="off" name="note" placeholder="请输入亮点简介"></textarea>
			</div>
			`,
			confirm: () => {
				const icon = $(".cm-modal input[name='icon']").val().trim();
				let iconColor = $(".cm-modal input[name='icon-color']").val().trim();
				iconColor = iconColor === '#fffffe' ? '' : iconColor;
				const title = $(".cm-modal input[name='title']").val().trim();
				const note = $(".cm-modal textarea[name='note']").val().trim();
				const str = `\n{feature icon="${icon}" icon-color="${iconColor}" title="${title}" note="${note}" /}\n`;
				this._replaceSelection(codeMirror, this._getLineCh(codeMirror) ? '\n' + str : str);
				codeMirror.focus();
			}
		});
	}
	handleTitleVertical(codeMirror) {
		this._openModal({
			title: '标题',
			innerHtml: `
			<div class="fitem">
				<label>标题级别</label>
				<select name="level">
					<option value="1">H1</option>
					<option value="2" selected>H2</option>
					<option value="3">H3</option>
					<option value="4">H4</option>
					<option value="5">H5</option>
					<option value="6">H6</option>
				</select>
			</div>
			<div class="fitem">
				<label>标题内容</label>
				<input autocomplete="off" name="content" placeholder="请输入标题内容"/>
			</div>
			<div class="fitem">
				<label>标题颜色</label>
				<input autocomplete="off" name="color" type="color" value="#fffffe"/>
			</div>
			`,
			confirm: () => {
				const level = $(".cm-modal select[name='level']").val().trim();
				const content = $(".cm-modal input[name='content']").val().trim();
				let color = $(".cm-modal input[name='color']").val().trim();
				color = (color === '#fffffe' ? '' : color);
				const str = `\n{title level="${level}" color="${color}" text="${content}" /}\n`;
				this._replaceSelection(codeMirror, this._getLineCh(codeMirror) ? '\n' + str : str);
				codeMirror.focus();
			}
		});
	}
	handleDplayer(cm) {
		this._openModal({
			title: 'M3U8/MP4/HLS/MPD/DASH/FLV 视频',
			innerHtml: `
<div class="fitem">
	<label>视频地址</label>
	<input autocomplete="off" name="src" placeholder="请输入视频资源地址"/>
</div>
<div class="fitem">
	<label>视频封面</label>
	<input autocomplete="off" name="pic" placeholder="请输入视频封面地址"/>
</div>
<div class="fitem">
	<label>默认音量</label>
	<input autocomplete="off" type="number" name="volume" value="100" placeholder="1-100" min="1" max="100"/>
</div>
<div class="fitem">
	<label>自动播放</label>
	<select name="autoplay">
		<option value="1">是</option>
		<option value="0" selected>否</option>
	</select>
</div>
<div class="fitem">
	<label>循环播放</label>
	<select name="loop">
		<option value="0" selected>否</option>
		<option value="1">是</option>
	</select>
</div>
<div class="fitem">
	<label>视频控件</label>
	<select name="controls">
		<option value="1" selected>是</option>
		<option value="0">否</option>
	</select>
</div>
			`,
			confirm: () => {
				let url = $(".cm-modal input[name='src']").val().trim();
				let pic = $(".cm-modal input[name='pic']").val().trim();
				let volume = $(".cm-modal input[name='volume']").val().trim();
				let autoplay = $(".cm-modal select[name='autoplay']").val().trim();
				let loop = $(".cm-modal select[name='loop']").val().trim();
				let controls = $(".cm-modal select[name='controls']").val().trim();
				const str = `\n{video url="${url}" pic="${pic}" autoplay="${autoplay}" loop="${loop}" volume="${volume}" controls="${controls}" /}\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleDplayerList(CodeMirror) {
		this._openModal({
			title: '视频剧集',
			innerHtml: `
<div class="fitem">
	<label>默认封面</label>
	<input autocomplete="off" name="pic" placeholder="请输入视频封面地址"/>
</div>
<div class="fitem">
	<label>默认音量</label>
	<input autocomplete="off" type="number" name="volume" value="100" placeholder="1-100" min="1" max="100"/>
</div>
<div class="fitem">
	<label>自动播放</label>
	<select name="autoplay">
		<option value="1" selected>是</option>
		<option value="0">否</option>
	</select>
</div>
<div class="fitem">
	<label>自动下集</label>
	<select name="next">
		<option value="1" selected>是</option>
		<option value="0">否</option>
	</select>
</div>
<div class="fitem">
	<label>循环播放</label>
	<select name="loop">
		<option value="1" selected>是</option>
		<option value="0">否</option>
	</select>
</div>`,
			confirm: () => {
				const pic = $(".cm-modal input[name='pic']").val().trim();
				const volume = $(".cm-modal input[name='volume']").val().trim();
				const autoplay = $(".cm-modal select[name='autoplay']").val().trim();
				const next = $(".cm-modal select[name='next']").val().trim();
				const loop = $(".cm-modal select[name='loop']").val().trim();
				const content = `\n{video-list pic="${pic}" autoplay="${autoplay}" next="${next}" loop="${loop}" volume="${volume}"}\n{video-list-item title="视频标题" desc="视频简介" url="视频地址" pic="视频封面" /}\n{video-list-item title="视频标题" desc="视频简介" url="视频地址" pic="视频封面" /}\n{/video-list}\n`;
				if (this._getLineCh(CodeMirror)) this._replaceSelection(CodeMirror, '\n' + content);
				else this._replaceSelection(CodeMirror, content);
				CodeMirror.focus();
			}
		});
	}
	handleDraft() {
		$('#btn-save').click();
	}
	handleExpression(cm) {
		const loading = layer.load(2, { shade: 0.3 });
		$.ajax({
			url: window.JoeConfig.expressionAPI,
			dataType: 'json',
			success: res => {
				let tabbarStr = '';
				let listsStr = '';
				for (let key in res) {
					const arr = res[key];
					key = key.replace('表情', '');
					tabbarStr += `<div class="tabbar-item ${key === '经典' ? 'active' : ''}" data-show="${key}">${key}</div>`;
					listsStr += `<div class="lists ${key === '经典' ? 'active' : ''}" data-show="${key}">${arr.map(item => {
						if (key == '颜文字' || key == 'emoji') {
							return `<div data-toggle="tooltip" class="lists-item" data-text="${item.icon}" title="${item.text}">${item.icon}</div>`;
						}
						let title = /.*?\((.*?)\)/.exec(item.text)[1];
						return `<div data-toggle="tooltip" class="lists-item" data-text="${item.text}" title="${title}"><img src="${window.Joe.THEME_URL + item.icon}"></div>`;
					}).join(' ')
						}</div>`;
				}
				layer.close(loading);
				this._openModal({
					title: '图片表情',
					hasFooter: false,
					innerHtml: `<div class="tabbar">${tabbarStr}</div>${listsStr}`,
					handler: () => {
						$('.cm-modal__wrapper-bodyer .tabbar-item').on('click', function () {
							const show = $(this).attr('data-show');
							$(this).addClass('active').siblings().removeClass('active');
							$('.cm-modal__wrapper-bodyer .lists').removeClass('active');
							$(".cm-modal__wrapper-bodyer .lists[data-show='" + show + "']").addClass('active');
						});
						const _this = this;
						$('.cm-modal__wrapper-bodyer .lists-item').on('click', function () {
							const text = $(this).attr('data-text');
							_this._replaceSelection(cm, `${text}`);
							$('.cm-modal').removeClass('active');
							cm.focus();
						});
					}
				});
				window.Joe.tooltip();
			}
		});
	}
	handleCenterTitle(cm) {
		this._openModal({
			title: '居中标题',
			innerHtml: `
				<div class="fitem">
					<label>标题内容</label>
					<input autocomplete="off" maxlength="10" name="text" placeholder="请输入标题内容（10字以内）"/>
				</div>
			`,
			confirm: () => {
				const text = $(".cm-modal input[name='text']").val();
				const str = `\n{center-title}${text}{/center-title}\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleHtml(cm) {
		const str = `${this._getLineCh(cm) ? '\n' : ''}!!!\n<p align="center">居中</p>\n<p align="right">居右</p>\n<font size="5" color="red">颜色大小</font>\n!!!\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleHide(CodeMirror) {
		const selection = this._getSelection(CodeMirror);
		if (selection) {
			let str;
			if (selection.includes('\n') || selection.includes('\r')) {
				str = `{hide display="block"}\n${selection}\n{/hide}`;
			} else {
				str = `{hide display="line"}${selection}{/hide}`;
			}
			this._replaceSelection(CodeMirror, str);
			CodeMirror.focus();
			return;
		}
		this._openModal({
			title: '按钮',
			innerHtml: `
				<div class="fitem">
					<label>显示方式</label>
					<select name="display">
						<option value="block" selected>块</option>
						<option value="line">行</option>
					</select>
				</div>
				<div class="fitem" style="align-items: flex-start">
					<label>隐藏内容</label>
					<textarea rows="5" autocomplete="off" name="content" placeholder="请输入要隐藏的内容"></textarea>
				</div>
			`,
			confirm: () => {
				const display = $(".cm-modal select[name='display']").val().trim();
				const content = $(".cm-modal textarea[name='content']").val().trim();
				let str;
				if (display == 'block') str = `\n{hide display="${display}"}\n${content}\n{/hide}\n`;
				if (display == 'line') str = `{hide display="${display}"}${content}{/hide}`;
				this._replaceSelection(CodeMirror, this._getLineCh(CodeMirror) ? '\n' + str : str);
				CodeMirror.focus();
			}
		});
	}
	handleButton(cm) {
		this._openModal({
			title: '按钮',
			innerHtml: `
				<div class="fitem">
					<label>按钮图标</label>
					<input autocomplete="off" name="icon" placeholder="请输入fa图标，例：fa-download"/>
				</div>
				<div class="fitem">
					<label>图标大全</label>
					<a href="https://fontawesome.dashgame.com" target="_blank">fontawesome.dashgame.com</a>
				</div>
				<div class="fitem">
					<label>按钮颜色</label>
					<select name="class-color">
						<option value="b-theme" selected>主题色</option>
						<option value="jb-red">渐变红</option>
						<option value="jb-pink">渐变粉</option>
						<option value="jb-yellow">渐变浅黄</option>
						<option value="jb-yellow-2">渐变深黄</option>
						<option value="jb-blue">渐变蓝</option>
						<option value="jb-cyan">渐变青</option>
						<option value="jb-green">渐变绿</option>
						<option value="jb-purple">渐变紫</option>
						<option value="jb-vip1">渐变黄会员</option>
						<option value="jb-vip2">渐变黑会员</option>
						<option value="b-gray">灰色</option>
						<option value="b-red">红色</option>
						<option value="b-yellow">黄色</option>
						<option value="b-cyan">青色</option>
						<option value="b-blue">天蓝色</option>
						<option value="b-blue-2">海蓝色</option>
						<option value="b-green">绿色</option>
						<option value="b-purple">紫色</option>
						<option value="b-black">黑色</option>
						<option value="custom">自定义</option>
					</select>
				</div>
				<div class="fitem input-style-color" style="display:none">
					<label>自定义按钮颜色</label>
					<input autocomplete="off" name="style-color" type="color" value="#ffffff"/>
				</div>
				<div class="fitem">
					<label>跳转链接</label>
					<input autocomplete="off" name="href" placeholder="请输入跳转链接"/>
				</div>
				<div class="fitem">
					<label>打开方式</label>
					<select name="target">
						<option value="_self" selected>self（在当前页面打开链接）</option>
						<option value="_blank">blank（在新窗口/标签页打开链接）</option>
						<option value="_parent">parent（在父框架打开链接）</option>
						<option value="_top">top（在整个窗口打开链接）</option>
					</select>
				</div>
				<div class="fitem">
					<label>圆角按钮</label>
					<select name="radius">
						<option value="0" selected>关闭</option>
						<option value="1">开启</option>
					</select>
				</div>
				<div class="fitem">
					<label>按钮内容</label>
					<input autocomplete="off" name="content" placeholder="请输入按钮内容"/>
				</div>
			`,
			handler: () => {
				const selectElement = document.querySelector('.cm-modal select[name="class-color"]');
				selectElement.addEventListener('change', function () {
					document.querySelector('.input-style-color').style.display = this.value === 'custom' ? 'flex' : 'none';
				});
			},
			confirm: () => {
				const icon = $(".cm-modal input[name='icon']").val().trim();
				const classColor = $(".cm-modal select[name='class-color']").val().trim();
				const styleColor = $(".cm-modal input[name='style-color']").val().trim();
				const color = classColor === 'custom' ? styleColor : classColor;
				const href = $(".cm-modal input[name='href']").val().trim();
				const target = $(".cm-modal select[name='target']").val().trim();
				const radius = $(".cm-modal select[name='radius']").val().trim();
				const content = $(".cm-modal input[name='content']").val().trim();
				const str = `{button icon="${icon}" color="${color}" href="${href}" target="${target}" radius="${radius}"}${content}{/button}\n`;
				this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleButtons(cm) {
		this._openModal({
			title: '按钮组',
			innerHtml: `
				<div class="fitem">
					<label>圆角按钮</label>
					<select name="radius">
						<option value="0" selected>关闭</option>
						<option value="1">开启</option>
					</select>
				</div>
				<div class="fitem">
					<label>按钮数量</label>
					<input autocomplete="off" type="number" name="count" placeholder="请输入按钮数量" min="1"/>
				</div>
			`,
			confirm: () => {
				const radius = $(".cm-modal select[name='radius']").val();
				const count = $(".cm-modal input[name='count']").val();
				const str = `\n{buttons radius="${radius}" count="${count}"}\n{/buttons}\n`;
				this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleColorDashed(cm) {
		this._openModal({
			title: '彩色虚线',
			innerHtml: `
				<div class="fitem">
					<label>开始颜色</label>
					<input autocomplete="off" value="#ff6c6c" name="startColor" type="color"/>
				</div>
				<div class="fitem">
					<label>结束颜色</label>
					<input autocomplete="off" value="#1989fa" name="endColor" type="color"/>
				</div>
			`,
			confirm: () => {
				const startColor = $(".cm-modal input[name='startColor']").val();
				const endColor = $(".cm-modal input[name='endColor']").val();
				const str = `\n{color-dashed start="${startColor}" end="${endColor}"/}\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleCardDefault(cm) {
		this._openModal({
			title: '默认卡片',
			innerHtml: `
				<div class="fitem">
					<label>卡片标题</label>
					<input autocomplete="off" name="label" placeholder="请输入卡片标题"/>
				</div>
				<div class="fitem">
					<label>卡片宽度</label>
					<input autocomplete="off" name="width" value="100%" placeholder="请输入卡片宽度，例如：100%"/>
				</div>
			`,
			confirm: () => {
				const label = $(".cm-modal input[name='label']").val();
				const width = $(".cm-modal input[name='width']").val();
				const str = `\n{card-default label="${label}" width="${width}"}\n卡片内容\n{/card-default}\n\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleMessage(cm) {
		this._openModal({
			title: '消息提示',
			innerHtml: `
				<div class="fitem">
					<label>消息类型</label>
					<select name="type">
						<option value="success" selected>success（成功）</option>
						<option value="info">info（信息）</option>
						<option value="warning">warning（警告）</option>
						<option value="error">error（错误）</option>
					</select>
				</div>
				<div class="fitem" style="align-items: flex-start">
					<label>消息内容</label>
					<textarea autocomplete="off" name="content" placeholder="请输入消息内容"></textarea>
				</div>
			`,
			confirm: () => {
				const type = $(".cm-modal select[name='type']").val();
				const content = $(".cm-modal textarea[name='content']").val();
				const str = `\n{message type="${type}"}${content}{/message}\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleProgress(cm) {
		this._openModal({
			title: '进度条',
			innerHtml: `
				<div class="fitem">
					<label>百分比数</label>
					<input autocomplete="off" name="percentage" placeholder="请输入百分比（最大100%）"/>
				</div>
				<div class="fitem">
					<label>自定义色</label>
					<input autocomplete="off" value="#ff6c6c" name="color" type="color"/>
				</div>
			`,
			confirm: () => {
				const percentage = $(".cm-modal input[name='percentage']").val();
				const color = $(".cm-modal input[name='color']").val();
				const str = `\n{progress percentage="${percentage}" color="${color}"/}\n\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleCallout(cm) {
		this._openModal({
			title: '插入标注',
			innerHtml: `
				<div class="fitem">
					<label>边框颜色</label>
					<input autocomplete="off" value="#f0ad4e" name="color" type="color"/>
				</div>
			`,
			confirm: () => {
				const color = $(".cm-modal input[name='color']").val();
				const str = `\n{callout color="${color}"}\n标注内容\n{/callout}\n\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleMp3(cm) {
		this._openModal({
			title: '插入音乐',
			innerHtml: `
<div class="fitem">
	<label>音频名称</label>
	<input autocomplete="off" name="name" placeholder="请输入音频名称"/>
</div>
<div class="fitem">
	<label>音频作者</label>
	<input autocomplete="off" name="artist" placeholder="请输入音频作者"/>
</div>
<div class="fitem">
	<label>音频地址</label>
	<input autocomplete="off" name="url" placeholder="请输入音频地址"/>
</div>
<div class="fitem">
	<label>音频封面</label>
	<input autocomplete="off" name="cover" placeholder="请输入图片地址"/>
</div>
<div class="fitem">
	<label>主题颜色</label>
	<input autocomplete="off" name="theme" type="color" value="#409eff"/>
</div>
<div class="fitem">
	<label>歌词内容</label>
	<input autocomplete="off" name="lrc" placeholder="请输入歌词内容"/>
</div>
<div class="fitem">
	<label>歌词类型</label>
	<select name="lrcType">
		<option value="0" selected>关闭歌词</option>
		<option value="3">LRC文件</option>
		<option value="1">字符串</option>
	</select>
</div>
<div class="fitem">
	<label>循环播放</label>
	<select name="loop">
		<option value="none" selected>不循环</option>
		<option value="one">循环一次</option>
		<option value="all">始终循环</option>
	</select>
</div>
<div class="fitem">
	<label>自动播放</label>
	<select name="autoplay">
		<option value="1">是</option>
		<option value="0" selected>否</option>
	</select>
</div>
<div class="fitem">
	<label>播放记忆</label>
	<select name="storage">
		<option value="1">是</option>
		<option value="0" selected>否</option>
	</select>
</div>
<div class="fitem">
	<label>自动主题色</label>
	<select name="autotheme">
		<option value="1" selected>是</option>
		<option value="0">否</option></select>
</div>
<div class="fitem">
为什么播放器设置自动播放后不生效？
<br />
因为大多数浏览器禁止了音频自动播放。
</div>
			`,
			confirm: () => {
				const name = $(".cm-modal input[name='name']").val();
				const artist = $(".cm-modal input[name='artist']").val();
				const url = $(".cm-modal input[name='url']").val().trim();
				const cover = $(".cm-modal input[name='cover']").val().trim();
				const theme = $(".cm-modal input[name='theme']").val();
				const lrc = $(".cm-modal input[name='lrc']").val();
				const lrcType = $(".cm-modal select[name='lrcType']").val();
				const loop = $(".cm-modal select[name='loop']").val();
				const autoplay = $(".cm-modal select[name='autoplay']").val();
				const storage = $(".cm-modal select[name='storage']").val();
				const autotheme = $(".cm-modal select[name='autotheme']").val();
				const str = `\n{mp3 name="${name}" artist="${artist}" url="${url}" cover="${cover}" theme="${theme}" lrc="${lrc}" lrcType="${lrcType}" loop="${loop}" autoplay="${autoplay}" storage="${storage}" autotheme="${autotheme}"/}\n\n`;
				if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
				else this._replaceSelection(cm, str);
				cm.focus();
			}
		});
	}
	handleTabs(cm) {
		const str = `${this._getLineCh(cm) ? '\n\n' : '\n'}{tabs}\n{tabs-pane label="标签一"}\n 标签一内容\n{/tabs-pane}\n{tabs-pane label="标签二"}\n 标签二内容\n{/tabs-pane}\n{/tabs}\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleCardList(cm) {
		const str = `${this._getLineCh(cm) ? '\n\n' : '\n'}{card-list}\n{card-list-item}\n列表一内容\n{/card-list-item}\n{card-list-item}\n列表二内容\n{/card-list-item}\n{/card-list}\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleTimeline(cm) {
		const str = `${this._getLineCh(cm) ? '\n\n' : '\n'}{timeline}\n{timeline-item color="#19be6b"}\n正式上线\n{/timeline-item}\n{timeline-item color="#ed4014"}\n删库跑路\n{/timeline-item}\n{/timeline}\n\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleCardDescribe(cm) {
		const str = `${this._getLineCh(cm) ? '\n\n' : '\n'}{card-describe title="卡片描述"}\n卡片内容\n{/card-describe}\n\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	// handleCopy(cm) {
	// 	this._openModal({
	// 		title: '复制文本',
	// 		innerHtml: `
	// 			<div class="fitem">
	// 				<label>显示文案</label>
	// 				<input autocomplete="off" name="showText" placeholder="请输入显示文案"/>
	// 			</div>
	// 			<div class="fitem" style="align-items: flex-start">
	// 				<label>复制内容</label>
	// 				<textarea autocomplete="off" name="copyText" placeholder="请输入需要复制的内容"></textarea>
	// 			</div>
	// 		`,
	// 		confirm: () => {
	// 			const showText = $(".cm-modal input[name='showText']").val();
	// 			const copyText = $(".cm-modal textarea[name='copyText']").val();
	// 			const str = `\n{copy showText="${showText}" copyText="${copyText}"/}\n\n`;
	// 			if (this._getLineCh(cm)) this._replaceSelection(cm, '\n' + str);
	// 			else this._replaceSelection(cm, str);
	// 			cm.focus();
	// 		}
	// 	});
	// }
	handlePulseLine(cm) {
		const str = `${this._getLineCh(cm) ? '\n\n' : '\n'}{pulse-line/}\n\n`;
		this._replaceSelection(cm, str);
		cm.focus();
	}
	handleCollapse(CodeMirror) {
		this._openModal({
			title: '折叠框',
			innerHtml: `
				<div class="fitem">
					<label>默认展开</label>
					<select name="open">
						<option value="0" selected>展开</option>
						<option value="1">不展开</option>
					</select>
				</div>
				<div class="fitem">
					<label>折叠标题</label>
					<input autocomplete="off" name="label" type="text"/>
				</div>
				<div class="fitem" style="align-items: flex-start">
					<label>折叠内容</label>
					<textarea autocomplete="off" name="content" placeholder="请输入折叠内容"></textarea>
				</div>
			`,
			confirm: () => {
				const open = $(".cm-modal select[name='open']").val().trim();
				const label = $(".cm-modal input[name='label']").val().trim();
				const content = $(".cm-modal textarea[name='content']").val();
				const str = `\n{collapse label="${label}" open="${open}"}\n${content}\n{/collapse}\n`;
				this._replaceSelection(CodeMirror, this._getLineCh(CodeMirror) ? '\n' + str : str);
				CodeMirror.focus();
			}
		});
	}
	handleAlert(CodeMirror) {
		this._openModal({
			title: '提醒框',
			innerHtml: `
				<div class="fitem">
					<label>背景颜色</label>
					<select name="class-background">
						<option value="b-theme" selected>主题色</option>
						<option value="jb-red">渐变红</option>
						<option value="jb-pink">渐变粉</option>
						<option value="jb-yellow">渐变浅黄</option>
						<option value="jb-yellow-2">渐变深黄</option>
						<option value="jb-blue">渐变蓝</option>
						<option value="jb-cyan">渐变青</option>
						<option value="jb-green">渐变绿</option>
						<option value="jb-purple">渐变紫</option>
						<option value="jb-vip1">渐变黄会员</option>
						<option value="jb-vip2">渐变黑会员</option>
						<option value="b-gray">灰色</option>
						<option value="b-red">红色</option>
						<option value="b-yellow">黄色</option>
						<option value="b-cyan">青色</option>
						<option value="b-blue">天蓝色</option>
						<option value="b-blue-2">海蓝色</option>
						<option value="b-green">绿色</option>
						<option value="b-purple">紫色</option>
						<option value="b-black">黑色</option>
						<option value="custom">自定义</option>
					</select>
				</div>
				<div class="fitem input-style-background" style="display:none">
					<label>自定义背景颜色</label>
					<input autocomplete="off" name="style-background" type="color" value="#ffffff"/>
				</div>
				<div class="fitem">
					<label>关闭按钮</label>
					<select name="close">
						<option value="0" selected>否</option>
						<option value="1">是</option>
					</select>
				</div>
				<div class="fitem" style="align-items: flex-start">
					<label>提醒内容</label>
					<textarea autocomplete="off" name="content" placeholder="请输入消息内容"></textarea>
				</div>
			`,
			handler: () => {
				const selectElement = document.querySelector('.cm-modal select[name="class-background"]');
				selectElement.addEventListener('change', function () {
					document.querySelector('.input-style-background').style.display = this.value === 'custom' ? 'flex' : 'none';
				});
				// 关闭弹窗自动删除元素 不用删除监听
			},
			confirm: () => {
				const classBackground = $(".cm-modal select[name='class-background']").val().trim();
				const styleBackground = $(".cm-modal input[name='style-background']").val().trim();
				const background = classBackground === 'custom' ? styleBackground : classBackground;
				const close = $(".cm-modal select[name='close']").val() === '1' ? '1' : '0';
				const content = $(".cm-modal textarea[name='content']").val();
				const str = `\n{alert color="${background}" close="${close}"}${content}{/alert}\n`;
				this._replaceSelection(CodeMirror, this._getLineCh(CodeMirror) ? '\n' + str : str);
				CodeMirror.focus();
			}
		});
	}
	handleIframe(CodeMirror) {
		this._openModal({
			title: '页面内嵌（可嵌入禁止跨域的MP4视频）',
			innerHtml: `
				<div class="fitem">
					<label>内嵌页面</label>
					<input autocomplete="off" name="url" type="url" placeholder="请输入页面网址链接"/>
				</div>
				<div class="fitem">
					<label>框架高度</label>
					<input autocomplete="off" name="height" value="50vh" placeholder="例：50vh"/>
				</div>
			`,
			confirm: () => {
				const height = $(".cm-modal input[name='height']").val().trim();
				const url = $(".cm-modal input[name='url']").val().trim();
				const str = `\n{iframe src="${url}" height="${height}" /}\n`;
				this._replaceSelection(CodeMirror, (this._getLineCh(CodeMirror) ? '\n' : '') + str);
				CodeMirror.focus();
			}
		});
	}
	handleCloud(codeMirror) {
		this._openModal({
			title: '云盘下载',
			innerHtml: `
				<div class="fitem">
					<label>云盘类型</label>
					<select name="type">
						<option value="default" selected>默认云盘</option>
						<option value="360">360网盘</option>
						<option value="baidu">百度云盘</option>
						<option value="tianyi">天翼云盘</option>
						<option value="chengtong">城通网盘</option>
						<option value="weiyun">腾讯微云</option>
						<option value="quark">夸克云盘</option>
						<option value="github">Github仓库</option>
						<option value="gitee">Gitee仓库</option>
						<option value="lanzou">蓝奏云网盘</option>
					</select>
				</div>
				<div class="fitem">
					<label>显示标题</label>
					<input autocomplete="off" name="title" placeholder="请输入显示标题"/>
				</div>
				<div class="fitem">
					<label>下载地址</label>
					<input autocomplete="off" name="url" placeholder="请输入云盘地址"/>
				</div>
				<div class="fitem">
					<label>提取密码</label>
					<input autocomplete="off" name="password" placeholder="请输入提取码（非必填）"/>
				</div>
			`,
			confirm: () => {
				const type = $(".cm-modal select[name='type']").val();
				const title = $(".cm-modal input[name='title']").val();
				const url = $(".cm-modal input[name='url']").val().trim();
				const password = $(".cm-modal input[name='password']").val().trim();
				const str = `{cloud title="${title}" type="${type}" url="${url}" password="${password}"/}`;
				if (this._getLineCh(codeMirror)) this._replaceSelection(codeMirror, '\n' + str);
				else this._replaceSelection(codeMirror, str);
				codeMirror.focus();
			}
		});
	}
}

/**
 * 用于异步加载文件的类。处理 JS 和 CSS 文件。
 */
class FileLoader {
	static scriptsLoaded = [];
	promises = [];

	static isScriptLoaded(_0x1bdc9a) {
		return FileLoader.scriptsLoaded.indexOf(_0x1bdc9a.split("/").pop()) > -1 ? true : false;
	}

	/**
	 * 将文件添加到加载队列。
	 * @param {string} fileUrl 要加载的文件的 URL。
	 */
	add(fileUrl) {
		const promise = new Promise((resolve, reject) => {
			const element = fileUrl.endsWith(".js") ? this.getScriptElm(fileUrl) : this.getLinkElm(fileUrl); // 根据扩展名确定元素类型

			element.addEventListener("load", () => {
				// 从 src 或 href 中提取文件名
				let url = element.src || element.href;
				const filename = url.split("/").pop();
				FileLoader.scriptsLoaded.push(filename);
				console.log(`文件已加载: ${filename}`);
				resolve(element); // 使用已加载的元素解析 Promise
			});

			element.addEventListener("error", () => {
				console.error(`加载失败: ${fileUrl}`); // 更具信息性的错误消息
				reject(fileUrl); // 使用失败的 URL 拒绝 Promise
			});
		});
		this.promises.push(promise);
	}

	/**
	 * 返回一个 Promise，在添加的所有文件加载完成后解析。
	 * @returns {Promise<any[]>} 解析为已加载元素数组的 Promise。
	 */
	loaded() {
		return Promise.all(this.promises);
	}

	getScriptElm(url) {
		var script = document.createElement("script");
		script.type = "text/javascript";
		script.src = url;
		script.async = false;
		document.getElementsByTagName("head")[0].appendChild(script);
		return script;
	}

	getLinkElm(url) {
		var link = document.createElement("link");
		link.rel = "stylesheet";
		link.type = "text/css";
		link.href = url;
		document.getElementsByTagName("HEAD")[0].appendChild(link);
		return link;
	}
}