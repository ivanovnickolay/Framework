<?php

/* First.tpl */
class __TwigTemplate_3f69aab54168a869a33a176a94a1179ec5581fdefa7f4085c0e0cff4aa6e0b3e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html xmlns=\"http://www.w3.org/1999/html\">
<head>
    <meta charset=\"utf-8\">
    <title>Первый</title>
</head>
<body>
\t<h1> Первая запись ";
        // line 8
        echo twig_escape_filter($this->env, (isset($context["name"]) ? $context["name"] : null), "html", null, true);
        echo "</h1> 
\t
</body>
";
    }

    public function getTemplateName()
    {
        return "First.tpl";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  28 => 8,  19 => 1,);
    }
}
