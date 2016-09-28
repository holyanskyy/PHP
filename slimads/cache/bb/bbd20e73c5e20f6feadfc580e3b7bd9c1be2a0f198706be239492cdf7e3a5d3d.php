<?php

/* index.html.twig */
class __TwigTemplate_d2d5e3f51b723997dcf7f3e7c66db76fc51540911eda27c1e3553db0abe5e713 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("master.html.twig", "index.html.twig", 2);
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
        echo "All ads";
    }

    // line 6
    public function block_content($context, array $blocks = array())
    {
        // line 7
        echo "    
<a href=\"/postad\"> Post an Ad </a>

";
        // line 10
        if ((isset($context["adList"]) ? $context["adList"] : null)) {
            // line 11
            echo "    <table border=\"1\">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Price</th>
            <th>Contact email:</th>
             <th>Operations</th>
        </tr>

        ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["adList"]) ? $context["adList"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["ad"]) {
                // line 21
                echo "            <tr>
                <td>";
                // line 22
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "ID", array(), "array"), "html", null, true);
                echo "</td>
                <td>";
                // line 23
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "msg", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 24
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "price", array()), "html", null, true);
                echo "</td>
                <td>";
                // line 25
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "contactEmail", array()), "html", null, true);
                echo "</td>
                 <td><a href='/postad/";
                // line 26
                echo twig_escape_filter($this->env, $this->getAttribute($context["ad"], "ID", array()), "html", null, true);
                echo "' >Edit</a></td>
            </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ad'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 29
            echo "
    </table>
";
        } else {
            // line 32
            echo "
    <p>There are no adds yet</p>

";
        }
        // line 36
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  99 => 36,  93 => 32,  88 => 29,  79 => 26,  75 => 25,  71 => 24,  67 => 23,  63 => 22,  60 => 21,  56 => 20,  45 => 11,  43 => 10,  38 => 7,  35 => 6,  29 => 4,  11 => 2,);
    }

    public function getSource()
    {
        return "{# empty Twig template #}
{% extends \"master.html.twig\"%}

{% block title %}All ads{% endblock %}

{% block content %}
    
<a href=\"/postad\"> Post an Ad </a>

{% if adList %}
    <table border=\"1\">
        <tr>
            <th>ID</th>
            <th>Message</th>
            <th>Price</th>
            <th>Contact email:</th>
             <th>Operations</th>
        </tr>

        {% for ad in adList %}
            <tr>
                <td>{{ ad['ID'] }}</td>
                <td>{{ ad.msg }}</td>
                <td>{{ ad.price }}</td>
                <td>{{ ad.contactEmail }}</td>
                 <td><a href='/postad/{{ad.ID}}' >Edit</a></td>
            </tr>
        {% endfor %}

    </table>
{% else %}

    <p>There are no adds yet</p>

{% endif %}

{% endblock %}


";
    }
}
