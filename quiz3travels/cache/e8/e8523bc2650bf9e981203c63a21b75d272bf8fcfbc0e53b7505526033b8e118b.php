<?php

/* register.html.twig */
class __TwigTemplate_2c4ab525631a3697f8123032c14da10cc7dd5b1467ac8bc280b911e5fcf13121 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "register.html.twig", 3);
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

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Register user";
    }

    // line 9
    public function block_content($context, array $blocks = array())
    {
        // line 10
        echo "    <h1>Register user</h1>

    ";
        // line 12
        if ((isset($context["errorList"]) ? $context["errorList"] : null)) {
            // line 13
            echo "        <ul>
            ";
            // line 14
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorList"]) ? $context["errorList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 15
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 16
            echo "   
        </ul>

    ";
        }
        // line 20
        echo "    
    <form method=\"post\">
        <label for=\"name\">Name:</label> 
        <input type=\"text\" name=\"name\" value=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "name", array()), "html", null, true);
        echo "\"<br><br><br>
        
        <label for=\"passport\"> Passport: </label> 
        <input type=\"text\" name=\"passport\" value=\"";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "passport", array()), "html", null, true);
        echo "\"><br><br>
        
        <label for=\"pass1\">Password: </label> 
        <input type=\"password\" name=\"pass1\"><br><br>
        
        <label for=\"pass1\">Password (repeated): </label> 
        <input type=\"password\" name=\"pass2\"><br><br>
        
        <input type=\"submit\" value=\"Register\"><br><br>
    </form>



";
    }

    public function getTemplateName()
    {
        return "register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 26,  71 => 23,  66 => 20,  60 => 16,  51 => 15,  47 => 14,  44 => 13,  42 => 12,  38 => 10,  35 => 9,  29 => 5,  11 => 3,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}

{% extends \"master.html.twig\"%}

{% block title %}Register user{% endblock %}



{% block content %}
    <h1>Register user</h1>

    {% if errorList %}
        <ul>
            {% for error in errorList %}
                <li>{{error}}</li>
                {% endfor %}   
        </ul>

    {% endif %}
    
    <form method=\"post\">
        <label for=\"name\">Name:</label> 
        <input type=\"text\" name=\"name\" value=\"{{v.name}}\"<br><br><br>
        
        <label for=\"passport\"> Passport: </label> 
        <input type=\"text\" name=\"passport\" value=\"{{v.passport}}\"><br><br>
        
        <label for=\"pass1\">Password: </label> 
        <input type=\"password\" name=\"pass1\"><br><br>
        
        <label for=\"pass1\">Password (repeated): </label> 
        <input type=\"password\" name=\"pass2\"><br><br>
        
        <input type=\"submit\" value=\"Register\"><br><br>
    </form>



{% endblock %}";
    }
}
