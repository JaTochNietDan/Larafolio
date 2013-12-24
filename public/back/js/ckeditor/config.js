/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.toolbarGroups = [
		{ name: 'document', groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'clipboard', groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'forms' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'links' },
		{ name: 'insert' },
		'/',
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'tools' },
		{ name: 'others' },
		{ name: 'pbckcode' }
	];

    config.extraPlugins = 'pbckcode';

    config.allowedContent = true;

    config.pbckcode = {
    	modes : 
    	[
			["C/C++"        , "c_pp"],
			["C9Search"     , "c9search"],
			["Clojure"      , "clojure"],
			["CoffeeScript" , "coffee"],
			["ColdFusion"   , "coldfusion"],
			["C#"           , "csharp"],
			["CSS"          , "css"],
			["Diff"         , "diff"],
			["Glsl"         , "glsl"],
			["Go"           , "golang"],
			["Groovy"       , "groovy"],
			["haXe"         , "haxe"],
			["HTML"         , "html"],
			["Jade"         , "jade"],
			["Java"         , "java"],
			["JavaScript"   , "javascript"],
			["JSON"         , "json"],
			["JSP"          , "jsp"],
			["JSX"          , "jsx"],
			["LaTeX"        , "latex"],
			["LESS"         , "less"],
			["Liquid"       , "liquid"],
			["Lua"          , "lua"],
			["LuaPage"      , "luapage"],
			["Markdown"     , "markdown"],
			["OCaml"        , "ocaml"],
			["Perl"         , "perl"],
			["pgSQL"        , "pgsql"],
			["PHP"          , "php"],
			["Powershell"   , "powershel1"],
			["Python"       , "python"],
			["R"            , "ruby"],
			["OpenSCAD"     , "scad"],
			["Scala"        , "scala"],
			["SCSS/Sass"    , "scss"],
			["SH"           , "sh"],
			["SQL"          , "sql"],
			["SVG"          , "svg"],
			["Tcl"          , "tcl"],
			["Text"         , "text"],
			["Textile"      , "textile"],
			["XML"          , "xml"],
			["XQuery"       , "xq"],
			["YAML"         , "yaml"]
		],
		theme : "monokai",
		highlighter : "PRISM"
	};
};
