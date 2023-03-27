<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* admin_panel/timetable.html.twig */
class __TwigTemplate_f6190bb578db91a3a5c05877c6381f04 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_panel/timetable.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_panel/timetable.html.twig"));

        // line 2
        echo "
";
        // line 10
        echo "
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    public function getTemplateName()
    {
        return "admin_panel/timetable.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  46 => 10,  43 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("{#{% extends 'admin_panel/base_admin_panel.html.twig' %}#}

{#{% block stylesheets %}#}
{#<style>#}
{#    /*.form {*/#}
{#    /*    max-width: 10em;*/#}
{#    /*}*/#}
{#</style>#}
{#{% endblock %}#}

{#{% block body %}#}
{#    <div class=\"row\">#}
{#        <div class=\"col-sm-2\">#}
{#            <div class=\"form\">#}
{#                {{ form(form_choose_group) }}#}
{#            </div>#}
{#        </div>#}
{#        <div class=\"col\">#}
{#            <table class=\"table table-striped\">#}
{#                <thead>#}
{#                <tr class=\"thead\">#}
{#                    <td>Nr</td>#}
{#                    <td>Subject</td>#}
{#                    <td>Teacher</td>#}
{#                </tr>#}
{#                </thead>#}
{#                <tbody>#}
{#                {% for lesson in lessons %}#}
{#                    <tr>#}
{#                        <td>{{ lesson.lesson }}</td>#}
{#                        <td>{{ lesson.subject.name }}</td>#}
{#                        <td>{{ lesson.teacher.user.username }}</td>#}
{#                    </tr>#}
{#                {% endfor %}#}
{#                </tbody>#}
{#            </table>#}
{#            <button class=\"btn btn-primary\">Add lesson</button>#}
{#            {% if add_lesson != null %}#}
{#                {{ form(add_lesson) }}#}
{#            {% endif %}#}
{#        </div>#}
{#    </div>#}
{#{% endblock %}#}", "admin_panel/timetable.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/sfcoursev2/templates/admin_panel/timetable.html.twig");
    }
}
