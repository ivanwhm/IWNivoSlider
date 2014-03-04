<?php

  /**
   * Extensão para o Nivo Slider (em jQuery).
   * 
   * @author Ivan Wilhelm <ivan.whm@me.com>
   * @version 1.0
   */
  class IWNivoSlider extends CWidget
  {

    /**
     * Código do ID.
     * @var string
     */
    public $id;

    /**
     * Define o tema. Verificar o tema instalado na pasta themes.
     * @var string
     */
    public $theme = '';

    /**
     * Opções de HTML.
     * @var array
     */
    public $htmlOptions = array();

    /**
     * Configuração, caso diferente do padrão.
     * @var array
     */
    public $config = array();

    /**
     * Contém o array de imagens que serão renderizadas.
     * @var array
     */
    public $images = array();

    /**
     * Inicia o Nivo Slider.
     */
    public function init()
    {
      if (isset($this->id))
      {
        $this->htmlOptions['id'] = $this->id;
      } else
      {
        $this->htmlOptions['id'] = $this->getId();
      }
      $this->publishAssets();
    }

    /**
     * Roda o Nivo Slider.
     */
    public function run()
    {
      $this->renderImages();
      $config = CJavaScript::encode($this->config);
      Yii::app()->getClientScript()->registerScript(__CLASS__, "$('#" . $this->htmlOptions['id'] . "').nivoSlider($config);");
    }

    /**
     * Renderiza as imagens.
     */
    private function renderImages()
    {
      echo CHtml::openTag('div', $this->htmlOptions) . PHP_EOL;
      if (count($this->images))
      {
        foreach ($this->images as $image)
        {
          if (isset($image['caption']))
          {
            $image['imageOptions']['title'] = $image['caption'];
          }

          if (isset($image['url']))
          {
            echo CHtml::link(CHtml::image($image['src'], $image['caption'], $image['imageOptions']), $image['url'], $image['linkOptions']) . PHP_EOL;
          } else
          {
            echo CHtml::image($image['src'], $image['caption'], $image['imageOptions']) . PHP_EOL;
          }
        }
      }
      echo CHtml::closeTag('div') . PHP_EOL;
    }

    /**
     * Publica os assets.
     * @throws Exception
     */
    public function publishAssets()
    {
      $assets = dirname(__FILE__) . '/assets';
      $baseUrl = Yii::app()->assetManager->publish($assets, false, -1, YII_DEBUG);
      if (is_dir($assets))
      {
        Yii::app()->clientScript->registerCoreScript('jquery');
        Yii::app()->clientScript->registerScriptFile($baseUrl . '/jquery.nivo.slider.pack.js', CClientScript::POS_HEAD);
        Yii::app()->clientScript->registerCssFile($baseUrl . '/nivo-slider.css', 'screen');
        if (($this->theme != '') and (file_exists(dirname(__FILE__) . '/assets/themes/' . $this->theme . '/' . $this->theme . '.css')))
        {
          Yii::app()->clientScript->registerCssFile($baseUrl . '/themes/' . $this->theme . '/' . $this->theme . '.css', 'screen');
        }
      } else
      {
        throw new Exception('NivoSlider - Erro: Não foi possível publicar os arquivos.');
      }
    }

  }
  