<?php
//foo
function
htmlElm_open($name,
    $attributes = array(),
    $singleton = false)
{
  $s = '<'.$name;
  foreach($attributes as $key  => $data) {
    if ($data != '') {
      if ($key == '_') {
        $s .=  ' '.$data;
      } else {

        $s .=  ' '.$key.'="'.$data.'"';
      }
    }
  }
  if ($singleton) {
    $s .=  ' /';
  }
  $s .=  '>'."\n";
  return $s;
}

  function
htmlElm_close($name)
{
  return '</'.$name.'>'."\n";
}

function
htmlElm_single($name,
    $attributes = array())
{
  return htmlElm_open($name, $attributes, true);
}

function
htmlElm($name,
    $attributes = array(),
    $data = '')
{
  if ($data == '') {
    $s = htmlElm_single($name, $attributes);
  } else {
    $s = htmlElm_open($name, $attributes).$data.htmlElm_close($name);
  }
  return $s;
}

function
html_div_open($class = '',
    $extra = '')
{
  return htmlElm_open('div', array('class'  => $class, '_'  => $extra));
}

  function
html_div_close()
{
  return htmlElm_close('div');
}

function
html_span_open($class = '',
    $extra = '')
{
  return htmlElm_open('span', array('class'  => $class, '_'  => $extra));
}

  function
html_span_close()
{
  return htmlElm_close('span');
}

function
html_table_open($class = '',
    $extra = '')
{
  return htmlElm_open('table', array('class'  => $class, '_'  => $extra));
}

  function
html_table_close()
{
  return htmlElm_close('table');
}

function
html_tr_open($class = '',
    $extra = '')
{
  return htmlElm_open('tr', array('class'  => $class, '_'  => $extra));
}

  function
html_tr_close()
{
  return htmlElm_close('tr');
}

function
html_td_open($class = '',
    $extra = '')
{
  return htmlElm_open('td', array('class'  => $class, '_'  => $extra));
}

  function
html_td_close()
{
  return htmlElm_close('td');
}

function
html_span($class,
    $data,
    $extra = '')
{
  return htmlElm('span', array('class'  => $class, '_'  => $extra), $data);
}

function
html_br($extra = '')
{
  return htmlElm('br', array('_'  => $extra));
}

function
html_sup($class,
    $data,
    $extra = '')
{
  return htmlElm('sup', array('class'  => $class, '_'  => $extra), $data);
}

function
html_a($href,
    $disp,
    $class = '',
    $extra = '')
{
  return htmlElm('a',
      array('href'  => $href, 'class'  => $class, '_' =>$extra), $disp);
}

function
html_input($name,
    $type,
    $value = '',
    $checked = '',
    $disabled = '',
    $readonly = '',
    $size = '',
    $maxlength = '',
    $extra = '')
{
  $attrib = array('name'  => $name, 'type'  => $type, '_'  => $extra);
  $data = getData();
  global $page;
  if(($name[0] == $page) && !isset($data['submitreset'.$page]) && ($page != 4)) {
    $value = '';
  }
  $lv = v($name);
  if ($lv !== null && $type == 'text') {
    $value = $lv;
  }
  if ($value != '') {
    $attrib['value'] = $value;
  }
  if ($type == 'checkbox' || $type == 'radio') {
    if ($lv !== null) {
      $checked = $lv;
    }
    if ($checked == true) {
      $attrib['checked'] = 'checked';
    }
  }
  if ($disabled == true) {
    $attrib['disabled'] = 'disabled';
  }
  if ($readonly == true) {
    $attrib['readonly'] = 'readonly';
  }
  if ($size != '') {
    $attrib['size'] = $size;
  }
  if ($maxlength != '') {
    $attrib['maxlength'] = $maxlength;
  }
  return htmlElm_single('input', $attrib);
}

  function
undobox($name)
{
  return submitinput('undo_'.$name, 'U');
}

function
checkbox($name,
    $checked,
    $extra = '')
{
  return html_input($name, 'checkbox', '', $checked, '', '', '', '',
      $extra);
}

function
textinput($name,
    $initialvalue,
    $size)
{
  return html_input($name, 'text', $initialvalue, '', '', '', $size);
}

function
passwordinput($name,
    $initialvalue,
    $size)
{
  return html_input($name, 'password', $initialvalue, '', '', '', $size);
}

function
numericinput($name,
    $initialvalue,
    $size = 3,
    $disabled = false)
{
  return html_input($name, 'text', $initialvalue, '', $disabled, '', $size);
}

function
hiddeninput($name,
    $value,
    $disabled = '',
    $readonly = '',
    $extra = '')
{
  return html_input($name, 'hidden', $value, '', $disabled, $readonly, '',
      '', $extra);
}

function
submitinput($name,
    $value,
    $disabled = false,
    $extra = '')
{
  return html_input($name, 'submit', $value, '', $disabled, '', '', '',
      $extra);
}

function
html_simpleselect($name,
    $data)
{
  //format is 'value' => 'text'
  $activevalue = v($name);
  $innerdata = "";
  foreach($data as $value  => $text) {
    $innerdata .= 
      htmlElm('option',
          array('value'  => $value, 'selected' =>($activevalue == $value ? 'selected' : '')),
          $text);
  }
  return htmlElm('select', array('name'  => $name), $innerdata);
}

function
formtable($data,
    $span = 0)
{
  $s = html_table_open('formtable');
  $s .=  html_tr_open('formtablerow');
  $i = -1;
  foreach($data as $disp  => $html) {
    if ($disp[0] == '_') {
      $s .=  $html;
    } else {
      if($html == 'x') {
        continue;
      }
      if ($span > 0) {
        $i++;
        if ($i > $span) {
          $i = 0;
          $s .=  html_tr_close();
          $s .=  html_tr_open('formtablerow');
        }
      } else {
        $s .=  html_tr_open('formtablerow');
      }

      $s .=  html_td_open('formtablecell').$disp.html_td_close();
      $s .=  html_td_open('formtablecell').$html.html_td_close();
      if ($span == 0) {
        $s .=  html_tr_close();
      }
    }
  }
  $s .=  html_tr_close();
  $s .=  htmlElm_close('table');
  return $s;
}

function
html_legend($title,
    $extra = '')
{
  $attrib = array();
  if ($extra != '') {
    $attrib['_'] = $extra;
  }
  return htmlElm('legend', $attrib, $title);
}

function
fieldset($title,
    $data)
{
  return htmlElm('fieldset', array(),
      ($title != '' ? html_legend($title) : '').$data);
}

  function
html_img($src,$w,$h)
{
  return htmlElm('img',array('src' => $src, 'height' => $h, 'width' => $w));
}

function js_alert($msg) {
  return 'alert("'.$msg.'");';
}

?>
