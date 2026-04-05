<!-- 太极八卦 -->
<style type="text/css" id="qj_dh_css">
	@import url(https://fonts.googleapis.com/css?family=Oswald|Roboto);

	#loading-animation {
		background-color: #986fee;
		height: 100vh;
		overflow: hidden;
		text-align: center;
		font-family: "Roboto", sans-serif;
		position: fixed;
		width: 100vw;
		z-index: 9999999999999
	}

	.table {
		display: table;
		width: 100%;
		height: 100%;
	}

	.table-cell {
		position: absolute;
		left: 0;
		right: 0;
		top: 50vh;
		margin-top: -200px;
		display: table-cell;
		vertical-align: middle;
		-moz-animation: rotate 5s infinite linear normal;
		-webkit-animation: rotate 5s infinite linear normal;
		animation: rotate 5s infinite linear normal;
	}

	#Path1,
	#Path2 {
		-moz-animation: Path 10s infinite ease-in-out;
		-webkit-animation: Path 10s infinite ease-in-out;
		animation: Path 10s infinite ease-in-out;
	}

	#Oval-3 {
		-moz-animation: rotate-oval-3 5s infinite linear normal;
		-webkit-animation: rotate-oval-3 5s infinite linear normal;
		animation: rotate-oval-3 5s infinite linear normal;
	}

	#Oval-4 {
		-moz-animation: rotate-oval-4 5s infinite linear normal;
		-webkit-animation: rotate-oval-4 5s infinite linear normal;
		animation: rotate-oval-4 5s infinite linear normal;
	}

	#Oval-3-2 {
		-moz-animation: rotate-oval-3-2 5s infinite linear normal;
		-webkit-animation: rotate-oval-3-2 5s infinite linear normal;
		animation: rotate-oval-3-2 5s infinite linear normal;
	}

	#Oval-4-2 {
		-moz-animation: rotate-oval-4-2 5s infinite linear normal;
		-webkit-animation: rotate-oval-4-2 5s infinite linear normal;
		animation: rotate-oval-4-2 5s infinite linear normal;
	}

	@keyframes rotate {
		0% {
			-moz-transform: rotate(0deg);
			-ms-transform: rotate(0deg);
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
		}

		100% {
			-moz-transform: rotate(360deg);
			-ms-transform: rotate(360deg);
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}

	@keyframes rotate-oval-3 {
		20% {
			transform: translateX(-3%) translateY(-4%);
		}

		60% {
			transform: translateX(-40%) translateY(-50%);
		}
	}

	@keyframes rotate-oval-4 {
		20% {
			transform: translateX(3%) translateY(4%);
		}

		60% {
			transform: translateX(40%) translateY(50%);
		}
	}

	@keyframes rotate-oval-3-2 {
		20% {
			transform: translateX(-3%) translateY(-4%);
		}

		60% {
			transform: translateX(130%) translateY(270%);
		}
	}

	@keyframes rotate-oval-4-2 {
		20% {
			transform: translateX(3%) translateY(4%);
		}

		60% {
			transform: translateX(-130%) translateY(-270%);
		}
	}

	@keyframes Path {
		20% {
			transform: translateX(-9%) translateY(-4%);
		}

		80% {
			transform: translateX(-19%) translateY(-5%);
		}
	}

	.rabbit {
		width: 50px;
		height: 50px;
		position: absolute;
		bottom: 20px;
		right: 20px;
		z-index: 3;
		fill: #fff;
	}
</style>
<div class="qjl qj_loading" id="loading-animation">
	<div class="table">
		<div class="table-cell">
			<svg width="70%" height="50vh" viewBox="0 0 470 470" version="1.1" xmlns="http://www.w3.org/2000/svg"
				xmlns:xlink="http://www.w3.org/1999/xlink">
				<defs>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-1">
						<feOffset dx="0" dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="25" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.63 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetInner1"></feOffset>
						<feGaussianBlur stdDeviation="25" in="shadowOffsetInner1" result="shadowBlurInner1">
						</feGaussianBlur>
						<feComposite in="shadowBlurInner1" in2="SourceAlpha" operator="arithmetic" k2="-1" k3="1"
							result="shadowInnerInner1"></feComposite>
						<feColorMatrix values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.7 0" in="shadowInnerInner1"
							type="matrix" result="shadowMatrixInner1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
							<feMergeNode in="shadowMatrixInner1"></feMergeNode>
						</feMerge>
					</filter>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-2">
						<feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="22.5" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.7 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
						</feMerge>
					</filter>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-3">
						<feOffset dx="0" dy="0" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="20" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.7 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
						</feMerge>
					</filter>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-4">
						<feOffset dx="0" dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="25" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.63 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
						</feMerge>
					</filter>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-5">
						<feOffset dx="0" dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="15" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 0   0 0 0 0 0   0 0 0 0 0  0 0 0 0.23 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
						</feMerge>
					</filter>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-6">
						<feOffset dx="0" dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="25" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.63 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
						</feMerge>
					</filter>
					<filter x="-50%" y="-50%" width="200%" height="200%" filterUnits="objectBoundingBox" id="filter-7">
						<feOffset dx="0" dy="1" in="SourceAlpha" result="shadowOffsetOuter1"></feOffset>
						<feGaussianBlur stdDeviation="15" in="shadowOffsetOuter1" result="shadowBlurOuter1">
						</feGaussianBlur>
						<feColorMatrix values="0 0 0 0 1   0 0 0 0 1   0 0 0 0 1  0 0 0 0.23 0" in="shadowBlurOuter1"
							type="matrix" result="shadowMatrixOuter1"></feColorMatrix>
						<feMerge>
							<feMergeNode in="shadowMatrixOuter1"></feMergeNode>
							<feMergeNode in="SourceGraphic"></feMergeNode>
						</feMerge>
					</filter>
				</defs>
				<g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
					<g id="Artboard-1">
						<ellipse id="Oval-1" fill="#485d51" cx="237" cy="228" rx="111" ry="111"></ellipse>
						<circle id="Oval" fill="#0E7CFE" filter="url(#filter-1)" cx="237" cy="228" r="39"></circle>
						<path
							d="M237.737045,228.155741 C206.543902,228.155741 181.166785,253.532859 181.166785,284.726749 C181.166785,312.174294 200.823516,335.102165 226.795386,340.215844 C169.77682,334.873529 125,286.749357 125,228.358226 C125,166.403809 175.404556,116 237.357479,116 C241.130723,116 242.479377,116.122537 242.479377,116.122537 C271.062631,118.710011 293.460007,142.732496 293.460007,171.989704 C293.460007,227.891241 237.737045,228.155741 237.737045,228.155741 L237.737045,228.155741 Z"
							id="Path1" fill="#FFFFFF" filter="url(#filter-2)"></path>
						<g id="Group"
							transform="translate(264.500000, 228.500000) scale(-1, -1) translate(-264.500000, -228.500000) translate(180.000000, 116.000000)"
							filter="url(#filter-3)" fill="#000000">
							<path
								d="M112.737045,112.155741 C81.5439023,112.155741 56.1667848,137.532859 56.1667848,168.726749 C56.1667848,196.174294 75.8235156,219.102165 101.795386,224.215844 C44.7768195,218.873529 0,170.749357 0,112.358226 C0,50.403809 50.4045562,-2.84217094e-14 112.357479,-2.84217094e-14 C116.130723,-2.84217094e-14 117.479377,0.122537018 117.479377,0.122537018 C146.062631,2.71001075 168.460007,26.7324965 168.460007,55.9897038 C168.460007,111.891241 112.737045,112.155741 112.737045,112.155741 L112.737045,112.155741 Z"
								id="Path2"></path>
						</g>
						<circle id="Oval-3" fill="#000000" filter="url(#filter-4)" cx="164" cy="156" r="39"></circle>
						<circle id="Oval-3-2" fill="#000000" filter="url(#filter-5)" cx="187" cy="83" r="16"></circle>
						<circle id="Oval-4" fill="#FFFFFF" filter="url(#filter-6)" cx="309" cy="300" r="39"></circle>
						<circle id="Oval-4-2" fill="#FFFFFF" filter="url(#filter-7)" cx="286" cy="373" r="16"></circle>
					</g>
				</g>
			</svg>
		</div>
	</div>
</div>