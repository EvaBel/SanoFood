<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* commande/listB.html.twig */
class __TwigTemplate_260a10257c372391b546471160e4a20e extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "admin.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/listB.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/listB.html.twig"));

        $this->parent = $this->loadTemplate("admin.html.twig", "commande/listB.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 4
        yield "<div class=\"content-page\">
    <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Liste des commande</h5>

                            <!-- Formulaire de recherche -->
                            <form action=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("afficher_commande");
        yield "\" method=\"GET\">
                                <div class=\"form-group\">
                                    <label for=\"search\">Rechercher par titre ou total :</label>
                                    <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" value=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "request", [], "any", false, false, false, 17), "query", [], "any", false, false, false, 17), "get", ["search"], "method", false, false, false, 17), "html", null, true);
        yield "\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-primary\">Rechercher</button>
                            </form>
                            <!-- Fin du formulaire de recherche -->

                            <!-- Tableau des commande filtrées -->
                            ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["Commande"]) || array_key_exists("Commande", $context) ? $context["Commande"] : (function () { throw new RuntimeError('Variable "Commande" does not exist.', 24, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["recl"]) {
            // line 25
            yield "                            <div class=\"card mb-3\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-subtitle mb-2 text-muted\">Nom: ";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "titre", [], "any", false, false, false, 27), "html", null, true);
            yield "</h5>
                                    <h7 class=\"card-subtitle mb-2 text-muted\">Créé le: ";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "datecreation", [], "any", false, false, false, 28), "d-m-Y"), "html", null, true);
            yield "</h7>
                                    <p class=\"card-text\">total: ";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "total", [], "any", false, false, false, 29), "html", null, true);
            yield "</p>
                                    <img src=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("uploads/images/" . CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "image", [], "any", false, false, false, 30))), "html", null, true);
            yield "\" style=\"width:80px; height:80px;\" />
                                    
                                    <!-- Formulaire d'envoi de message -->
                                    <!-- Bouton Update -->
                                    <a href=\"";
            // line 34
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("update_ab", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "id", [], "any", false, false, false, 34)]), "html", null, true);
            yield "\" class=\"btn btn-warning\">Modifier</a>

                                    <!-- Bouton Delete -->
                                    <form action=\"";
            // line 37
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_ab", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["recl"], "id", [], "any", false, false, false, 37)]), "html", null, true);
            yield "\" method=\"post\" class=\"d-inline\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');\">
                                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                                        <button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>
                                    </form>

                                    <div class=\"btn-group\" role=\"group\" aria-label=\"Actions\">
                                       

                                    </div>
                                </div>
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['recl'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        yield "                            <!-- Fin du tableau des commande filtrées -->

                            <!-- Pagination -->
                            <div class=\"pagination\">
                                ";
        // line 53
        $context["currentPage"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["Commande"]) || array_key_exists("Commande", $context) ? $context["Commande"] : (function () { throw new RuntimeError('Variable "Commande" does not exist.', 53, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 53);
        // line 54
        yield "                                ";
        $context["previous"] = ((((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 54, $this->source); })()) > 1)) ? (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 54, $this->source); })()) - 1)) : (false));
        // line 55
        yield "                                ";
        $context["next"] = ((((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 55, $this->source); })()) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["Commande"]) || array_key_exists("Commande", $context) ? $context["Commande"] : (function () { throw new RuntimeError('Variable "Commande" does not exist.', 55, $this->source); })()), "pageCount", [], "any", false, false, false, 55))) ? (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 55, $this->source); })()) + 1)) : (false));
        // line 56
        yield "                                <ul class=\"pagination\">
                                    ";
        // line 57
        if ((isset($context["previous"]) || array_key_exists("previous", $context) ? $context["previous"] : (function () { throw new RuntimeError('Variable "previous" does not exist.', 57, $this->source); })())) {
            // line 58
            yield "                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"";
            // line 59
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("afficher_commandeAdmin");
            yield "?page=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["previous"]) || array_key_exists("previous", $context) ? $context["previous"] : (function () { throw new RuntimeError('Variable "previous" does not exist.', 59, $this->source); })()), "html", null, true);
            yield "\">Précédent</a>
                                        </li>
                                    ";
        }
        // line 62
        yield "                                    <li class=\"page-item active\">
                                        <span class=\"page-link\">";
        // line 63
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 63, $this->source); })()), "html", null, true);
        yield "</span>
                                    </li>
                                    ";
        // line 65
        if ((isset($context["next"]) || array_key_exists("next", $context) ? $context["next"] : (function () { throw new RuntimeError('Variable "next" does not exist.', 65, $this->source); })())) {
            // line 66
            yield "                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"";
            // line 67
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("afficher_commandeAdmin");
            yield "?page=";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["next"]) || array_key_exists("next", $context) ? $context["next"] : (function () { throw new RuntimeError('Variable "next" does not exist.', 67, $this->source); })()), "html", null, true);
            yield "\">Suivant</a>
                                        </li>
                                    ";
        }
        // line 70
        yield "                                </ul>
                            </div>
                            <!-- Fin de la pagination -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "commande/listB.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  206 => 70,  198 => 67,  195 => 66,  193 => 65,  188 => 63,  185 => 62,  177 => 59,  174 => 58,  172 => 57,  169 => 56,  166 => 55,  163 => 54,  161 => 53,  155 => 49,  137 => 37,  131 => 34,  124 => 30,  120 => 29,  116 => 28,  112 => 27,  108 => 25,  104 => 24,  94 => 17,  88 => 14,  76 => 4,  63 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'admin.html.twig' %}

{% block  body%}
<div class=\"content-page\">
    <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title\">Liste des commande</h5>

                            <!-- Formulaire de recherche -->
                            <form action=\"{{ path('afficher_commande') }}\" method=\"GET\">
                                <div class=\"form-group\">
                                    <label for=\"search\">Rechercher par titre ou total :</label>
                                    <input type=\"text\" class=\"form-control\" id=\"search\" name=\"search\" value=\"{{ app.request.query.get('search') }}\">
                                </div>
                                <button type=\"submit\" class=\"btn btn-primary\">Rechercher</button>
                            </form>
                            <!-- Fin du formulaire de recherche -->

                            <!-- Tableau des commande filtrées -->
                            {% for recl in Commande %}
                            <div class=\"card mb-3\">
                                <div class=\"card-body\">
                                    <h5 class=\"card-subtitle mb-2 text-muted\">Nom: {{ recl.titre }}</h5>
                                    <h7 class=\"card-subtitle mb-2 text-muted\">Créé le: {{ recl.datecreation|date('d-m-Y') }}</h7>
                                    <p class=\"card-text\">total: {{ recl.total }}</p>
                                    <img src=\"{{ asset('uploads/images/' ~ recl.image) }}\" style=\"width:80px; height:80px;\" />
                                    
                                    <!-- Formulaire d'envoi de message -->
                                    <!-- Bouton Update -->
                                    <a href=\"{{ path('update_ab', {'id': recl.id}) }}\" class=\"btn btn-warning\">Modifier</a>

                                    <!-- Bouton Delete -->
                                    <form action=\"{{ path('delete_ab', {'id': recl.id}) }}\" method=\"post\" class=\"d-inline\" onsubmit=\"return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?');\">
                                        <input type=\"hidden\" name=\"_method\" value=\"DELETE\">
                                        <button type=\"submit\" class=\"btn btn-danger\">Supprimer</button>
                                    </form>

                                    <div class=\"btn-group\" role=\"group\" aria-label=\"Actions\">
                                       

                                    </div>
                                </div>
                            </div>
                            {% endfor %}
                            <!-- Fin du tableau des commande filtrées -->

                            <!-- Pagination -->
                            <div class=\"pagination\">
                                {% set currentPage = Commande.currentPageNumber %}
                                {% set previous = currentPage > 1 ? currentPage - 1 : false %}
                                {% set next = currentPage < Commande.pageCount ? currentPage + 1 : false %}
                                <ul class=\"pagination\">
                                    {% if previous %}
                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"{{ path('afficher_commandeAdmin') }}?page={{ previous }}\">Précédent</a>
                                        </li>
                                    {% endif %}
                                    <li class=\"page-item active\">
                                        <span class=\"page-link\">{{ currentPage }}</span>
                                    </li>
                                    {% if next %}
                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"{{ path('afficher_commandeAdmin') }}?page={{ next }}\">Suivant</a>
                                        </li>
                                    {% endif %}
                                </ul>
                            </div>
                            <!-- Fin de la pagination -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "commande/listB.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\commande\\listB.html.twig");
    }
}
