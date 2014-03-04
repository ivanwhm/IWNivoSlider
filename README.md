Extensão que cria um slide de imagens baseado no jQuery NivoSlider
==================================================================

Esta extensão cria um slideshow de imagens. É baseada no script NivoSlider, mais informações em http://nivo.dev7studios.com

##Requisitos

Esta extensão requer a versão 1.1 ou superior do Yii.

Testes foram realizados somente na versão 1.1.x.

##Uso

Descompacte o arquivo e copie os arquivos para o diretório 

~~~
protected/extensions/nivoslider/
~~~

Na view correspondente utilize o seguinte código:

~~~
//Cria um array com todas as imagens do slider.
$imagens = array(
  'src' => '/caminho/para/a/imagem.jpg',
  'caption' => 'texto explicativo da imagem, caso queira',
  'url' => 'http://url-do-link-da-imagem-caso-queria.html',
  'imageOptions' => array(
    'title' => 'legenda da imagem, caso queira',
    'width' => 880,
    'height' => 200,
    'border' => 0,
  ),
  'linkOptions' => array(
    'title' => 'legenda da imagem, caso queira',
  )
);

//Aciona o NivoSlider
$this->widget('ext.nivoslider.NivoSlider', array(
  'id' => 'slider',
  'theme' => 'iwtheme',
  'images' => $imagens,
  'config' => array(
    'effect' => 'fade',
    'directionNav' => FALSE,
  )
)
);
~~~

##Créditos

Os créditos pelo script jQuery NivoSlider são de Dev7studios.
Maiores informações no endereço: http://nivo.dev7studios.com
Consulte informações sobre o licenciamento do NivoSlider.

##Versões

04/03/2014 - 1.0 - Versão inicial da extensão


##Contatos

Ivan Wilhelm

E-mail: ivan.whm@me.com

Twitter: @ivanwhm

Skype: ivan.whm

Outros projetos: https://github.com/ivanwhm