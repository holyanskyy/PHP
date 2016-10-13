<?php

/* order_success.html.twig */
class __TwigTemplate_c2722abc6f79172b786a01e69274394fc1bc049c1a367fb64b0061230ce0456b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "order_success.html.twig", 2);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "master.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_title($context, array $blocks = array())
    {
        echo "Successful order";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "
    <p>Order was placed successfully</p>
   


";
    }

    public function getTemplateName()
    {
        return "order_success.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "
{% extends \"master.html.twig\"%}

{% block title %}Successful order{% endblock %}

{% block content %}

    <p>Order was placed successfully</p>
   


{% endblock %}

";
    }
}
