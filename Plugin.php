<?php

/**
 * PrismJs 代码高亮插件 for Typecho
 *
 * @package PrismJs
 * @author Allan
 * @version 1.0.0
 * @link https://home.mydata.top:8683
 */
class LightPrismJs_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     */
    public static function activate()
    {
        Typecho_Plugin::factory('Widget_Archive')->header = array('LightPrismJs_Plugin', 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array('LightPrismJs_Plugin', 'footer');
	 echo "success";
    }

    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     */
    public static function deactivate(){}

    /**
     * 获取插件配置面板
     *
     * @param Form $form 配置面板
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        /** 分类名称 */
        $themes = array_map(function ($item) {
			$filename = basename($item);
    			return str_replace('.js', '', $filename);
		}, glob(dirname(__FILE__) . '/prism/*.js'));
        $themes = array_combine($themes, $themes);
	 
        $theme = new Typecho_Widget_Helper_Form_Element_Select('theme', $themes, 'default',
            _t('代码配色样式'));
        $form->addInput($theme->addRule('enum', _t('必须选择配色样式'), $themes));
    }

    /**
     * 个人用户的配置面板
     *
     * @param Form $form
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 输出头部css
     * 
     * @access public
     * @param unknown $header
     * @return unknown
     */
    public static function header() {
        $cssUrl = Helper::options()->pluginUrl . '/LightPrismJs/prism/' . Helper::options()->plugin('LightPrismJs')->theme . ".css";
        echo '<link rel="stylesheet" type="text/css" href="' . $cssUrl . '" />';
        $cssUrl = Helper::options()->pluginUrl . '/LightPrismJs/res/style.css';
        echo '<link rel="stylesheet" type="text/css" href="' . $cssUrl . '" />';
    }

    
    /**
     * 输出尾部js
     * 
     * @access public
     * @param unknown $header
     * @return unknown
     */
    public static function footer() {
        $jsUrl = Helper::options()->pluginUrl . '/LightPrismJs/prism/' . Helper::options()->plugin('LightPrismJs')->theme . ".js";
        echo '<script type="text/javascript" src="'. $jsUrl .'"></script>';

	 echo <<<TXT
		<script type="text/javascript">
			(function(){
				let pres = document.querySelectorAll('pre');
				let lineNumberClassName = 'line-numbers';
				pres.forEach(function (item, index) {
					item.className = item.className == '' ? lineNumberClassName : item.className + ' ' + lineNumberClassName;
				});
			})();
		</script>
TXT;
    }
}
