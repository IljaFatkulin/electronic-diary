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

/* admin_panel/timetable/main_side.html.twig */
class __TwigTemplate_169caffebd3d91766200a511d39a8118 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin_panel/base_admin_panel.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_panel/timetable/main_side.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "admin_panel/timetable/main_side.html.twig"));

        $this->parent = $this->loadTemplate("admin_panel/base_admin_panel.html.twig", "admin_panel/timetable/main_side.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 4, $this->source); })()), "flashes", [0 => "success"], "method", false, false, false, 4));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 5
            echo "        <div class=\"alert alert-success\">
            ";
            // line 6
            echo twig_escape_filter($this->env, $context["message"], "html", null, true);
            echo "
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "
    <table class=\"table table-striped\">
        <thead>
        <tr class=\"thead\">
            <td>Nr</td>
            <td>Subject</td>
            <td>Teacher</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lessons"]) || array_key_exists("lessons", $context) ? $context["lessons"] : (function () { throw new RuntimeError('Variable "lessons" does not exist.', 20, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["lesson"]) {
            // line 21
            echo "            <tr>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lesson"], "lesson", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lesson"], "subject", [], "any", false, false, false, 23), "name", [], "any", false, false, false, 23), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lesson"], "teacher", [], "any", false, false, false, 24), "user", [], "any", false, false, false, 24), "username", [], "any", false, false, false, 24), "html", null, true);
            echo "</td>
                <td>
                    <a class=\"text-danger\" href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_timetable_delete", ["id" => twig_get_attribute($this->env, $this->source, $context["lesson"], "id", [], "any", false, false, false, 26), "date" => (isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 26, $this->source); })()), "group" => (isset($context["group"]) || array_key_exists("group", $context) ? $context["group"] : (function () { throw new RuntimeError('Variable "group" does not exist.', 26, $this->source); })())]), "html", null, true);
            echo "\">
                        Delete
                    </a>
                </td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lesson'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "        </tbody>
    </table>
    ";
        // line 34
        if (((isset($context["add_lesson"]) || array_key_exists("add_lesson", $context) ? $context["add_lesson"] : (function () { throw new RuntimeError('Variable "add_lesson" does not exist.', 34, $this->source); })()) != null)) {
            // line 35
            echo "        ";
            echo             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["add_lesson"]) || array_key_exists("add_lesson", $context) ? $context["add_lesson"] : (function () { throw new RuntimeError('Variable "add_lesson" does not exist.', 35, $this->source); })()), 'form');
            echo "
    ";
        }
        // line 37
        echo "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

    }

    public function getTemplateName()
    {
        return "admin_panel/timetable/main_side.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 37,  136 => 35,  134 => 34,  130 => 32,  118 => 26,  113 => 24,  109 => 23,  105 => 22,  102 => 21,  98 => 20,  85 => 9,  76 => 6,  73 => 5,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin_panel/base_admin_panel.html.twig' %}

{% block body %}
    {% for message in app.flashes('success') %}
        <div class=\"alert alert-success\">
            {{ message }}
        </div>
    {% endfor %}

    <table class=\"table table-striped\">
        <thead>
        <tr class=\"thead\">
            <td>Nr</td>
            <td>Subject</td>
            <td>Teacher</td>
            <td>Action</td>
        </tr>
        </thead>
        <tbody>
        {% for lesson in lessons %}
            <tr>
                <td>{{ lesson.lesson }}</td>
                <td>{{ lesson.subject.name }}</td>
                <td>{{ lesson.teacher.user.username }}</td>
                <td>
                    <a class=\"text-danger\" href=\"{{ path('admin_timetable_delete', {id: lesson.id, date: date, group: group}) }}\">
                        Delete
                    </a>
                </td>
            </tr>
        {% endfor %}
        </tbody>
    </table>
    {% if add_lesson != null %}
        {{ form(add_lesson) }}
    {% endif %}

{% endblock %}", "admin_panel/timetable/main_side.html.twig", "/Applications/XAMPP/xamppfiles/htdocs/sfcoursev2/templates/admin_panel/timetable/main_side.html.twig");
    }
}
