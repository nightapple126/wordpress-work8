<?php 
/**
	Admin Page Framework v3.8.34 by Michael Uno 
	Generated by PHP Class Files Script Generator <https://github.com/michaeluno/PHP-Class-Files-Script-Generator>
	<http://en.michaeluno.jp/index-wp-mysql-for-speed>
	Copyright (c) 2013-2021, Michael Uno; Licensed under MIT <http://opensource.org/licenses/MIT> */
class Imfs_AdminPageFramework_Form_View__Resource__Head extends Imfs_AdminPageFramework_FrameworkUtility {
    public $oForm;
    public function __construct($oForm, $sHeadActionHook = 'admin_head') {
        $this->oForm = $oForm;
        if (in_array($this->oForm->aArguments['structure_type'], array('widget'))) {
            return;
        }
        add_action($sHeadActionHook, array($this, '_replyToInsertRequiredInternalScripts'));
    }
    public function _replyToInsertRequiredInternalScripts() {
        if (!$this->oForm->isInThePage()) {
            return;
        }
        if ($this->hasBeenCalled(__METHOD__)) {
            return;
        }
        echo "<script type='text/javascript' class='index-wp-mysql-for-speed-form-script-required-in-head'>" . '/* <![CDATA[ */ ' . $this->_getScripts_RequiredInHead() . ' /* ]]> */' . "</script>";
    }
    private function _getScripts_RequiredInHead() {
        return 'document.write( "<style class=\'index-wp-mysql-for-speed-js-embedded-internal-style\'>' . str_replace('\\n', '', esc_js($this->_getInternalCSS())) . '</style>" );';
    }
    private function _getInternalCSS() {
        $_oLoadingCSS = new Imfs_AdminPageFramework_Form_View___CSS_Loading;
        $_oLoadingCSS->add($this->_getScriptElementConcealerCSSRules());
        return $_oLoadingCSS->get();
    }
    private function _getScriptElementConcealerCSSRules() {
        return ".index-wp-mysql-for-speed-form-js-on {visibility: hidden;}.widget .index-wp-mysql-for-speed-form-js-on { visibility: visible; }";
    }
    }
    