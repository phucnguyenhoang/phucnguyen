<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Phuc's home</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <script type="text/javascript" src="<?php echo base_url('resources/bower_components/webcomponentsjs/webcomponents.min.js'); ?>"></script>
	<link rel="import" href="../../resources/elements/elements.html">

</head>
<body class="layout fullbleed">
	<dom-module id="main-view">
		<style is="custom-style">
			#loading {
				@apply(--layout-fit);
				@apply(--layout-horizontal);
				@apply(--layout-center-justified);
				background-color: var(--paper-grey-50);
			}
			#loading paper-spinner {
				@apply(--layout-self-center);
				display: block;
			}
		</style>
		<template>
			<main-container></main-container>
			<div id="loading">
				<paper-spinner active></paper-spinner>
			</div>			
		</template>
		<script>
			Polymer({
				is: 'main-view',
				behaviors: [
					Polymer.NeonAnimationRunnerBehavior
				],
				properties: {
					animationConfig: {
						value: function() {
							return {
								'exit': [{
									name: 'scale-down-animation',
									node: this.$.loading,
									axis: '',
									timing: {
										duration: 1000
									}
								}, {
									name: 'fade-out-animation',
									node: this.$.loading,
									timing: {
										delay: 50,
										duration: 800
									}
								}]
							}
						}
					}
				},
				listeners: {
					'neon-animation-finish': '_onLoad'
				},
				ready: function() {
					this.playAnimation('exit');
					console.log('ready');
				},
				_onLoad: function() {
					this.$.loading.style.display = 'none';
				}
			});
		</script>
	</dom-module>
	<main-view></main-view>
</body>
</html>