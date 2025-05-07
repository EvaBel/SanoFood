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

/* demande/index.html.twig */
class __TwigTemplate_7f331f3688c682cd9e86058dc969f016 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "demande/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "demande/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "demande/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/kk.css"), "html", null, true);
        yield "\">
    <!-- Ajoute FontAwesome pour les icônes -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\">
    <style>
        /* Styles pour les boutons */
        .btn-advise, .btn-respond, .btn-share {
            border: none;
            background: none;
            color: #666;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center; /* Centrer le texte et l'icône verticalement */
        }
    
        .btn-advise:hover, .btn-respond:hover, .btn-share:hover {
            color: #1877f2; /* Couleur bleue Facebook */
        }
    
        .btn-advise i, .btn-respond i, .btn-share i {
            margin-right: 5px;
        }
    
        /* Style pour la section des actions */
        .demande-actions {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
            display: flex;
            justify-content: center; /* Centrer les boutons horizontalement */
            gap: 20px; /* Espacement entre les boutons */
        }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 40
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

        // line 41
        yield "<div class=\"content-page\">
    <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title mb-4\">Gestion des demandes</h5>

                            <!-- Formulaire de recherche -->
                            <form action=\"";
        // line 51
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demande");
        yield "\" method=\"GET\" class=\"mb-4\">
                                <div class=\"input-group\">
                                    <input type=\"text\" class=\"form-control\" name=\"search\" placeholder=\"Rechercher une demande par nom ou type...\" value=\"";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 53, $this->source); })()), "request", [], "any", false, false, false, 53), "query", [], "any", false, false, false, 53), "get", ["search"], "method", false, false, false, 53), "html", null, true);
        yield "\">
                                    <div class=\"input-group-append\">
                                        <button type=\"submit\" class=\"btn btn-primary\">
                                            <i class=\"fas fa-search\"></i> Rechercher
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Fin du formulaire de recherche -->

                            <!-- Liste verticale des demandes -->
                            <div class=\"row\">
                                ";
        // line 65
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable($context["demande"]);
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["demande"]) {
            // line 66
            yield "                                <div class=\"col-12 mb-4\"> <!-- Chaque topic prend toute la largeur -->
                                    <div class=\"card card-demande\">
                                        <div class=\"card-body\">
                                            <!-- Image de la demande -->
                                            <div class=\"demande-image\" style=\"background-image: url('https://via.placeholder.com/300');\"></div>
                                            <!-- Nom de la demande -->
                                            <h5 class=\"demande-nom\">";
            // line 72
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "nom", [], "any", false, false, false, 72), "html", null, true);
            yield "</h5>
                                            <!-- Information sur la demande -->
                                            <p class=\"demande-type\"><strong>Content :</strong> ";
            // line 74
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "content", [], "any", false, false, false, 74), "html", null, true);
            yield "</p>
                                            <p class=\"demande-type\"><strong>Email :</strong> ";
            // line 75
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "email", [], "any", false, false, false, 75), "html", null, true);
            yield "</p>
                                            <p class=\"demande-type\"><strong>Specialite :</strong> ";
            // line 76
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "specialite", [], "any", false, false, false, 76), "html", null, true);
            yield "</p>


                                            <p class=\"demande-date\"><strong>Date de plantation :</strong> ";
            // line 79
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "dateInscription", [], "any", false, false, false, 79), "d-m-Y"), "html", null, true);
            yield "</p>
                                            <!-- Boutons d'actions -->
                                            <div class=\"demande-actions\">
                                                <!-- Boutons personnalisés -->
                                                
                                                <a class=\"btn cur-p btn-danger\" href=\"";
            // line 84
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("delete_demande", ["idD" => CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "idD", [], "any", false, false, false, 84)]), "html", null, true);
            yield "\">Supprimer</a>
                                                <a class=\"btn cur-p btn-success\" href=\"";
            // line 85
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("update_demande", ["idD" => CoreExtension::getAttribute($this->env, $this->source, $context["demande"], "idD", [], "any", false, false, false, 85)]), "html", null, true);
            yield "\">Mettre à jour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                ";
            $context['_iterated'] = true;
        }
        // line 90
        if (!$context['_iterated']) {
            // line 91
            yield "                                <div class=\"col-12\">
                                    <div class=\"alert alert-info\" role=\"alert\">
                                        Aucune demande trouvée.
                                    </div>
                                </div>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['demande'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 97
        yield "                            </div>
                            <!-- Fin de la liste verticale -->

                            <!-- Pagination -->
                            ";
        // line 101
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["demande"]) || array_key_exists("demande", $context) ? $context["demande"] : (function () { throw new RuntimeError('Variable "demande" does not exist.', 101, $this->source); })())) > 0)) {
            // line 102
            yield "                            <div class=\"pagination justify-content-center mt-4\">
                                <ul class=\"pagination\">
                                    <!-- Lien \"Précédent\" -->
                                    ";
            // line 105
            if ((array_key_exists("previous", $context) && (isset($context["previous"]) || array_key_exists("previous", $context) ? $context["previous"] : (function () { throw new RuntimeError('Variable "previous" does not exist.', 105, $this->source); })()))) {
                // line 106
                yield "                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"";
                // line 107
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demande");
                yield "?page=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["previous"]) || array_key_exists("previous", $context) ? $context["previous"] : (function () { throw new RuntimeError('Variable "previous" does not exist.', 107, $this->source); })()), "html", null, true);
                yield "&search=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 107, $this->source); })()), "request", [], "any", false, false, false, 107), "query", [], "any", false, false, false, 107), "get", ["search"], "method", false, false, false, 107), "html", null, true);
                yield "\">Précédent</a>
                                        </li>
                                    ";
            }
            // line 110
            yield "                                    <!-- Page actuelle -->
                                    <li class=\"page-item active\">
                                        <span class=\"page-link\">";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 112, $this->source); })()), "html", null, true);
            yield "</span>
                                    </li>
                                    <!-- Lien \"Suivant\" -->
                                    ";
            // line 115
            if ((array_key_exists("next", $context) && (isset($context["next"]) || array_key_exists("next", $context) ? $context["next"] : (function () { throw new RuntimeError('Variable "next" does not exist.', 115, $this->source); })()))) {
                // line 116
                yield "                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"";
                // line 117
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_demande");
                yield "?page=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["next"]) || array_key_exists("next", $context) ? $context["next"] : (function () { throw new RuntimeError('Variable "next" does not exist.', 117, $this->source); })()), "html", null, true);
                yield "&search=";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 117, $this->source); })()), "request", [], "any", false, false, false, 117), "query", [], "any", false, false, false, 117), "get", ["search"], "method", false, false, false, 117), "html", null, true);
                yield "\">Suivant</a>
                                        </li>
                                    ";
            }
            // line 120
            yield "                                </ul>
                            </div>
                            <!-- Indicateur de page -->
                            <div class=\"text-center mt-2\">
                                Page ";
            // line 124
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 124, $this->source); })()), "html", null, true);
            yield " sur ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["demande"]) || array_key_exists("demande", $context) ? $context["demande"] : (function () { throw new RuntimeError('Variable "demande" does not exist.', 124, $this->source); })()), "getPageCount", [], "method", false, false, false, 124), "html", null, true);
            yield "
                            </div>
                            ";
        }
        // line 127
        yield "                            <!-- Fin de la pagination -->
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
        return "demande/index.html.twig";
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
        return array (  306 => 127,  298 => 124,  292 => 120,  282 => 117,  279 => 116,  277 => 115,  271 => 112,  267 => 110,  257 => 107,  254 => 106,  252 => 105,  247 => 102,  245 => 101,  239 => 97,  228 => 91,  226 => 90,  216 => 85,  212 => 84,  204 => 79,  198 => 76,  194 => 75,  190 => 74,  185 => 72,  177 => 66,  172 => 65,  157 => 53,  152 => 51,  140 => 41,  127 => 40,  82 => 5,  77 => 4,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('css/kk.css') }}\">
    <!-- Ajoute FontAwesome pour les icônes -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css\">
    <style>
        /* Styles pour les boutons */
        .btn-advise, .btn-respond, .btn-share {
            border: none;
            background: none;
            color: #666;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center; /* Centrer le texte et l'icône verticalement */
        }
    
        .btn-advise:hover, .btn-respond:hover, .btn-share:hover {
            color: #1877f2; /* Couleur bleue Facebook */
        }
    
        .btn-advise i, .btn-respond i, .btn-share i {
            margin-right: 5px;
        }
    
        /* Style pour la section des actions */
        .demande-actions {
            border-top: 1px solid #ddd;
            padding-top: 10px;
            margin-top: 10px;
            display: flex;
            justify-content: center; /* Centrer les boutons horizontalement */
            gap: 20px; /* Espacement entre les boutons */
        }
    </style>
{% endblock %}

{% block body %}
<div class=\"content-page\">
    <div class=\"content\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card\">
                        <div class=\"card-body\">
                            <h5 class=\"card-title mb-4\">Gestion des demandes</h5>

                            <!-- Formulaire de recherche -->
                            <form action=\"{{ path('app_demande') }}\" method=\"GET\" class=\"mb-4\">
                                <div class=\"input-group\">
                                    <input type=\"text\" class=\"form-control\" name=\"search\" placeholder=\"Rechercher une demande par nom ou type...\" value=\"{{ app.request.query.get('search') }}\">
                                    <div class=\"input-group-append\">
                                        <button type=\"submit\" class=\"btn btn-primary\">
                                            <i class=\"fas fa-search\"></i> Rechercher
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Fin du formulaire de recherche -->

                            <!-- Liste verticale des demandes -->
                            <div class=\"row\">
                                {% for demande in demande %}
                                <div class=\"col-12 mb-4\"> <!-- Chaque topic prend toute la largeur -->
                                    <div class=\"card card-demande\">
                                        <div class=\"card-body\">
                                            <!-- Image de la demande -->
                                            <div class=\"demande-image\" style=\"background-image: url('https://via.placeholder.com/300');\"></div>
                                            <!-- Nom de la demande -->
                                            <h5 class=\"demande-nom\">{{ demande.nom }}</h5>
                                            <!-- Information sur la demande -->
                                            <p class=\"demande-type\"><strong>Content :</strong> {{ demande.content }}</p>
                                            <p class=\"demande-type\"><strong>Email :</strong> {{ demande.email }}</p>
                                            <p class=\"demande-type\"><strong>Specialite :</strong> {{ demande.specialite }}</p>


                                            <p class=\"demande-date\"><strong>Date de plantation :</strong> {{ demande.dateInscription|date('d-m-Y') }}</p>
                                            <!-- Boutons d'actions -->
                                            <div class=\"demande-actions\">
                                                <!-- Boutons personnalisés -->
                                                
                                                <a class=\"btn cur-p btn-danger\" href=\"{{ path('delete_demande', {'idD': demande.idD}) }}\">Supprimer</a>
                                                <a class=\"btn cur-p btn-success\" href=\"{{ path('update_demande', {'idD': demande.idD}) }}\">Mettre à jour</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {% else %}
                                <div class=\"col-12\">
                                    <div class=\"alert alert-info\" role=\"alert\">
                                        Aucune demande trouvée.
                                    </div>
                                </div>
                                {% endfor %}
                            </div>
                            <!-- Fin de la liste verticale -->

                            <!-- Pagination -->
                            {% if demande|length > 0 %}
                            <div class=\"pagination justify-content-center mt-4\">
                                <ul class=\"pagination\">
                                    <!-- Lien \"Précédent\" -->
                                    {% if previous is defined and previous %}
                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"{{ path('app_demande') }}?page={{ previous }}&search={{ app.request.query.get('search') }}\">Précédent</a>
                                        </li>
                                    {% endif %}
                                    <!-- Page actuelle -->
                                    <li class=\"page-item active\">
                                        <span class=\"page-link\">{{ currentPage }}</span>
                                    </li>
                                    <!-- Lien \"Suivant\" -->
                                    {% if next is defined and next %}
                                        <li class=\"page-item\">
                                            <a class=\"page-link\" href=\"{{ path('app_demande') }}?page={{ next }}&search={{ app.request.query.get('search') }}\">Suivant</a>
                                        </li>
                                    {% endif %}
                                </ul>
                            </div>
                            <!-- Indicateur de page -->
                            <div class=\"text-center mt-2\">
                                Page {{ currentPage }} sur {{ demande.getPageCount() }}
                            </div>
                            {% endif %}
                            <!-- Fin de la pagination -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "demande/index.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\symfony_crud_safwen_yahya\\templates\\demande\\index.html.twig");
    }
}
