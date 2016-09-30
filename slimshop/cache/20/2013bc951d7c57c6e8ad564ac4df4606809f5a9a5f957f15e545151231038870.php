<?php

/* register.html.twig */
class __TwigTemplate_6dcbfbef8680eb5749561f2918a57e1454486c76e390c1099c3f8ad5c10dc67f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("master.html.twig", "register.html.twig", 3);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'head' => array($this, 'block_head'),
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

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script>
        \$(document).ready(function (){
          \$('input[name=email]').keyup(function(){
            \$('#result').load('/emailexists/' + \$(this).val()); 
              
          });  
        });

    </script>

    <style>
        #message{
            color: red;
            font-weight: bold;
        }
    </style>
";
    }

    // line 27
    public function block_content($context, array $blocks = array())
    {
        // line 28
        echo "    <h1>Register user</h1>

    ";
        // line 30
        if ((isset($context["errorList"]) ? $context["errorList"] : null)) {
            // line 31
            echo "        <ul>
            ";
            // line 32
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["errorList"]) ? $context["errorList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                // line 33
                echo "                <li>";
                echo twig_escape_filter($this->env, $context["error"], "html", null, true);
                echo "</li>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 34
            echo "   
        </ul>

    ";
        }
        // line 38
        echo "    <form method=\"post\">
        <label for=\"name\">Name:</label> 
        <input type=\"text\" name=\"name\" value=\"";
        // line 40
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "name", array()), "html", null, true);
        echo "\"<br><br><br>

        <label for=\"email\"> Email: </label> 
        <input type=\"text\" name=\"email\" value=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["v"]) ? $context["v"] : null), "email", array()), "html", null, true);
        echo "\">
        <span id=\"result\"></span><br><br>

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
        return array (  101 => 43,  95 => 40,  91 => 38,  85 => 34,  76 => 33,  72 => 32,  69 => 31,  67 => 30,  63 => 28,  60 => 27,  39 => 8,  36 => 7,  30 => 5,  11 => 3,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}

{% extends \"master.html.twig\"%}

{% block title %}Register user{% endblock %}

{% block head %}
    <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js\"></script>
    <script>
        \$(document).ready(function (){
          \$('input[name=email]').keyup(function(){
            \$('#result').load('/emailexists/' + \$(this).val()); 
              
          });  
        });

    </script>

    <style>
        #message{
            color: red;
            font-weight: bold;
        }
    </style>
{% endblock %}

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

        <label for=\"email\"> Email: </label> 
        <input type=\"text\" name=\"email\" value=\"{{v.email}}\">
        <span id=\"result\"></span><br><br>

        <label for=\"pass1\">Password: </label> 
        <input type=\"password\" name=\"pass1\"><br><br>

        <label for=\"pass1\">Password (repeated): </label> 
        <input type=\"password\" name=\"pass2\"><br><br>

        <input type=\"submit\" value=\"Register\"><br><br>
    </form>



{% endblock %}";
    }
}
