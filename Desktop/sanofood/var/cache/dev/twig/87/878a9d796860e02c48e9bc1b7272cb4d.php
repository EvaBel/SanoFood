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

/* home/index.html.twig */
class __TwigTemplate_90ce3342b0022fef74cfe8a89d581164 extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "home/index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        // line 3
        yield "<section class=\"banner_main\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-12 \">
                  <div class=\"text-bg\">
                     <h1>FARMING COMPANY</h1>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it</p>
                     <a href=\"#\">Sign up</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- three_box -->
      <div class=\"three_box\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-4\">
                  <div class=\"box_text\">
                     <figure><img src=\"images/img1.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
               <div class=\"col-md-4\">
                  <div class=\"box_text\">
                     <figure><img src=\"images/img2.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
               <div class=\"col-md-4\">
                  <div class=\"box_text\">
                     <figure><img src=\"images/img3.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- three_box -->
      <!-- hottest -->
      <div  class=\"hottest\">
         <div class=\"container\">
            <div class=\"row d_flex\">
               <div class=\"col-md-5\">
                  <div class=\"titlepage\">
                     <h2>World’s Hottest Destinations <br>for Vegans</h2>
                  </div>
               </div>
               <div class=\"col-md-7\">
                  <div class=\"hottest_box\">
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- end hottest -->
      <!-- choose  section -->
      <div class=\"choose \">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-8\">
                  <div class=\"titlepage\">
                     <h2>Why Choose Us? </h2>
                     <p>there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined  </p>
                  </div>
               </div>
            </div>
         </div>
         <div class=\"container-fluid\">
            <div class=\"row d_flex\">
               <div class=\"col-xl-7 col-lg-7 col-md-12 col-sm-12\">
                  <div class=\"padding_with\">
                     <div class=\"row\">
                        <div class=\"col-md-6 padding_bottom\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon1.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Excellent Service</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                        <div class=\"col-md-6 padding_bottom\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon2.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Clean Working</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                        <div class=\"col-md-6 padding_bottom2\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon3.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Quality And Reliability</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                        <div class=\"col-md-6\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon4.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Expert Farmer</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class=\"col-xl-5 col-lg-5 col-md-12 col-sm-12\">
                  <div class=\"choose_img\">
                     <figure><img src=\"images/food.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
            </div>
         </div>
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-5\">
                  <a class=\"read_more\" href=\"#\">Read More</a>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- end choose  section -->
      <!-- product  section -->
      <div class=\"product\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-6\">
                  <div class=\"titlepage\">
                     <h2>Our Product</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class=\"container-fluid\">
            <div class=\"row\">
               <div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-12 padding_left0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product1.jpg\" alt=\"#\"/></figure>
                     <h3 class=\"black\">vegetable</h3>
                  </div>
               </div>
               <div class=\"col-xl-3 col-lg-3 col-md-3 col-sm-12\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product2.jpg\" alt=\"#\"/></figure>
                     <h3 >weat</h3>
                  </div>
               </div>
               <div class=\"col-xl-3 col-lg-3 col-md-3 col-sm-12 padding_right0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product3.jpg\" alt=\"#\"/></figure>
                     <h3>fruit</h3>
                  </div>
               </div>
               <div class=\"col-xl-7 col-lg-7 col-md-7 col-sm-12 padding_left0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product4.jpg\" alt=\"#\"/></figure>
                     <h3>sunflowere</h3>
                  </div>
               </div>
               <div class=\"col-xl-5 col-lg-5 col-md-5 col-sm-12 padding_right0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product5.jpg\" alt=\"#\"/></figure>
                     <h3>Livestock</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end product  section -->
      <!-- about -->
      <div class=\"about\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <div class=\"titlepage\">
                     <h2>People Says About Farm</h2>
                  </div>
               </div>
            </div>
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <div id=\"myCarousel\" class=\"carousel slide about_Carousel \" data-ride=\"carousel\">
                     <ol class=\"carousel-indicators\">
                        <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
                        <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
                        <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
                     </ol>
                     <div class=\"carousel-inner\">
                        <div class=\"carousel-item active\">
                           <div class=\"container\">
                              <div class=\"carousel-caption \">
                                 <div class=\"row\">
                                    <div class=\"col-md-12\">
                                       <div class=\"test_box\">
                                          <i><img src=\"images/tes1.png\" alt=\"#\"/></i>
                                          <h4>jhone Du</h4>
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=\"carousel-item\">
                           <div class=\"container\">
                              <div class=\"carousel-caption\">
                                 <div class=\"row\">
                                    <div class=\"col-md-12\">
                                       <div class=\"test_box\">
                                          <i><img src=\"images/tes1.png\" alt=\"#\"/></i>
                                          <h4>jhone Du</h4>
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=\"carousel-item\">
                           <div class=\"container\">
                              <div class=\"carousel-caption\">
                                 <div class=\"row\">
                                    <div class=\"col-md-12\">
                                       <div class=\"test_box\">
                                          <i><img src=\"images/tes1.png\" alt=\"#\"/></i>
                                          <h4>jhone Du</h4>
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class=\"carousel-control-prev\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">
                     <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                     <span class=\"sr-only\">Previous</span>
                     </a>
                     <a class=\"carousel-control-next\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">
                     <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                     <span class=\"sr-only\">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
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
        return "home/index.html.twig";
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
        return array (  76 => 3,  63 => 2,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block body %}
<section class=\"banner_main\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-12 \">
                  <div class=\"text-bg\">
                     <h1>FARMING COMPANY</h1>
                     <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it</p>
                     <a href=\"#\">Sign up</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- end banner -->
      <!-- three_box -->
      <div class=\"three_box\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-4\">
                  <div class=\"box_text\">
                     <figure><img src=\"images/img1.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
               <div class=\"col-md-4\">
                  <div class=\"box_text\">
                     <figure><img src=\"images/img2.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
               <div class=\"col-md-4\">
                  <div class=\"box_text\">
                     <figure><img src=\"images/img3.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- three_box -->
      <!-- hottest -->
      <div  class=\"hottest\">
         <div class=\"container\">
            <div class=\"row d_flex\">
               <div class=\"col-md-5\">
                  <div class=\"titlepage\">
                     <h2>World’s Hottest Destinations <br>for Vegans</h2>
                  </div>
               </div>
               <div class=\"col-md-7\">
                  <div class=\"hottest_box\">
                     <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
      </div>
      <!-- end hottest -->
      <!-- choose  section -->
      <div class=\"choose \">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-8\">
                  <div class=\"titlepage\">
                     <h2>Why Choose Us? </h2>
                     <p>there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined  </p>
                  </div>
               </div>
            </div>
         </div>
         <div class=\"container-fluid\">
            <div class=\"row d_flex\">
               <div class=\"col-xl-7 col-lg-7 col-md-12 col-sm-12\">
                  <div class=\"padding_with\">
                     <div class=\"row\">
                        <div class=\"col-md-6 padding_bottom\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon1.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Excellent Service</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                        <div class=\"col-md-6 padding_bottom\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon2.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Clean Working</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                        <div class=\"col-md-6 padding_bottom2\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon3.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Quality And Reliability</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                        <div class=\"col-md-6\">
                           <div class=\"choose_box\">
                              <i><img src=\"images/icon4.png\" alt=\"#\"/></i>
                              <div class=\"choose_text\">
                                 <h3>Expert Farmer</h3>
                                 <p>It is a long established fact that a reader will be distracted by the readable content of a</p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class=\"col-xl-5 col-lg-5 col-md-12 col-sm-12\">
                  <div class=\"choose_img\">
                     <figure><img src=\"images/food.jpg\" alt=\"#\"/></figure>
                  </div>
               </div>
            </div>
         </div>
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-5\">
                  <a class=\"read_more\" href=\"#\">Read More</a>
               </div>
            </div>
         </div>
      </div>
      </div>
      <!-- end choose  section -->
      <!-- product  section -->
      <div class=\"product\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-6\">
                  <div class=\"titlepage\">
                     <h2>Our Product</h2>
                  </div>
               </div>
            </div>
         </div>
         <div class=\"container-fluid\">
            <div class=\"row\">
               <div class=\"col-xl-6 col-lg-6 col-md-6 col-sm-12 padding_left0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product1.jpg\" alt=\"#\"/></figure>
                     <h3 class=\"black\">vegetable</h3>
                  </div>
               </div>
               <div class=\"col-xl-3 col-lg-3 col-md-3 col-sm-12\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product2.jpg\" alt=\"#\"/></figure>
                     <h3 >weat</h3>
                  </div>
               </div>
               <div class=\"col-xl-3 col-lg-3 col-md-3 col-sm-12 padding_right0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product3.jpg\" alt=\"#\"/></figure>
                     <h3>fruit</h3>
                  </div>
               </div>
               <div class=\"col-xl-7 col-lg-7 col-md-7 col-sm-12 padding_left0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product4.jpg\" alt=\"#\"/></figure>
                     <h3>sunflowere</h3>
                  </div>
               </div>
               <div class=\"col-xl-5 col-lg-5 col-md-5 col-sm-12 padding_right0\">
                  <div class=\"product_box\">
                     <figure><img src=\"images/product5.jpg\" alt=\"#\"/></figure>
                     <h3>Livestock</h3>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end product  section -->
      <!-- about -->
      <div class=\"about\">
         <div class=\"container\">
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <div class=\"titlepage\">
                     <h2>People Says About Farm</h2>
                  </div>
               </div>
            </div>
            <div class=\"row\">
               <div class=\"col-md-12\">
                  <div id=\"myCarousel\" class=\"carousel slide about_Carousel \" data-ride=\"carousel\">
                     <ol class=\"carousel-indicators\">
                        <li data-target=\"#myCarousel\" data-slide-to=\"0\" class=\"active\"></li>
                        <li data-target=\"#myCarousel\" data-slide-to=\"1\"></li>
                        <li data-target=\"#myCarousel\" data-slide-to=\"2\"></li>
                     </ol>
                     <div class=\"carousel-inner\">
                        <div class=\"carousel-item active\">
                           <div class=\"container\">
                              <div class=\"carousel-caption \">
                                 <div class=\"row\">
                                    <div class=\"col-md-12\">
                                       <div class=\"test_box\">
                                          <i><img src=\"images/tes1.png\" alt=\"#\"/></i>
                                          <h4>jhone Du</h4>
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=\"carousel-item\">
                           <div class=\"container\">
                              <div class=\"carousel-caption\">
                                 <div class=\"row\">
                                    <div class=\"col-md-12\">
                                       <div class=\"test_box\">
                                          <i><img src=\"images/tes1.png\" alt=\"#\"/></i>
                                          <h4>jhone Du</h4>
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class=\"carousel-item\">
                           <div class=\"container\">
                              <div class=\"carousel-caption\">
                                 <div class=\"row\">
                                    <div class=\"col-md-12\">
                                       <div class=\"test_box\">
                                          <i><img src=\"images/tes1.png\" alt=\"#\"/></i>
                                          <h4>jhone Du</h4>
                                          <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters,</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class=\"carousel-control-prev\" href=\"#myCarousel\" role=\"button\" data-slide=\"prev\">
                     <span class=\"carousel-control-prev-icon\" aria-hidden=\"true\"></span>
                     <span class=\"sr-only\">Previous</span>
                     </a>
                     <a class=\"carousel-control-next\" href=\"#myCarousel\" role=\"button\" data-slide=\"next\">
                     <span class=\"carousel-control-next-icon\" aria-hidden=\"true\"></span>
                     <span class=\"sr-only\">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end about -->
      </div>
{% endblock %}
", "home/index.html.twig", "C:\\Users\\Motaz\\mm Dropbox\\Motaz Sammoud\\PC\\Desktop\\2025\\safwen_yahya_symfony\\symfony_crud_safwen_yahya\\templates\\home\\index.html.twig");
    }
}
