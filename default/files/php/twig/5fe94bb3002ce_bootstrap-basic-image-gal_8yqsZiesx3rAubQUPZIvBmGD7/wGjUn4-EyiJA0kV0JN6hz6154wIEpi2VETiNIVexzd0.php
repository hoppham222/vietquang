<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* modules/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig */
class __TwigTemplate_c0f7cf647623ad1af1d1253d002667ee7013873bbae7e39352932c331227e014 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 21, "for" => 23, "trans" => 53];
        $filters = ["escape" => 19, "length" => 21];
        $functions = ["range" => 64];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'trans'],
                ['escape', 'length'],
                ['range']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 16
        echo "
<div class=\"bootstrap-basic-image-gallery\">

  <div class=\"main-image\" data-toggle=\"modal\" data-slide-to=\"0\" data-target=\"#";
        // line 19
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["modal"] ?? null), "id", [])), "html", null, true));
        echo "\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["main"] ?? null)), "html", null, true));
        echo "</div>

  ";
        // line 21
        if ((twig_length_filter($this->env, $this->getAttribute(($context["thumbnails"] ?? null), "images", [])) > 1)) {
            // line 22
            echo "    <div class=\"thumbnails\">
      ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["thumbnails"] ?? null), "images", []));
            foreach ($context['_seq'] as $context["key"] => $context["image"]) {
                // line 24
                echo "        <div class=\"thumb ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["thumbnails"] ?? null), "class", [])), "html", null, true));
                echo "\" style=\"width:";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["thumbnails"] ?? null), "width", [])), "html", null, true));
                echo "%;\" data-toggle=\"modal\" data-slide-to=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true));
                echo "\" data-target=\"#";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["modal"] ?? null), "id", [])), "html", null, true));
                echo "\">
          ";
                // line 25
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["image"]), "html", null, true));
                echo "
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "    </div>
  ";
        }
        // line 30
        echo "
  <div class=\"modal fade carousel slide ";
        // line 31
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lazyload"] ?? null)), "html", null, true));
        echo "\" id=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["modal"] ?? null), "id", [])), "html", null, true));
        echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["modal"] ?? null), "id", [])), "html", null, true));
        echo "-title\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\" id=\"";
        // line 35
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["modal"] ?? null), "id", [])), "html", null, true));
        echo "-title\">";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["modal"] ?? null), "label", [])), "html", null, true));
        echo "</h5>
          <button class=\"close btn btn-default\" data-dismiss=\"modal\" value=\"&times;\"><span aria-hidden=\"true\">×</span></button>
        </div>

        <div class=\"modal-body\">
          <div id=\"";
        // line 40
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["carousel"] ?? null), "id", [])), "html", null, true));
        echo "\" class=\"carousel slide ";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lazyload"] ?? null)), "html", null, true));
        echo "\" data-interval=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["carousel"] ?? null), "interval", [])), "html", null, true));
        echo "\" data-ride=\"";
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["carousel"] ?? null), "autoplay", [])), "html", null, true));
        echo "\">

            <div class=\"carousel-inner\" role=\"listbox\">
              ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["carousel"] ?? null), "images", []));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["carousel_image"]) {
            // line 44
            echo "                <div class=\"item slide-";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"]), "html", null, true));
            echo " ";
            if ($this->getAttribute($context["loop"], "first", [])) {
                echo "active";
            }
            echo "\">
                  ";
            // line 45
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["carousel_image"]), "html", null, true));
            echo "
                  <div class=\"carousel-caption\">";
            // line 46
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["carousel_image"], "#caption")), "html", null, true));
            echo "</div>
                </div>
              ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['carousel_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
              ";
        // line 50
        if ((twig_length_filter($this->env, $this->getAttribute(($context["thumbnails"] ?? null), "images", [])) > 1)) {
            // line 51
            echo "              <a class=\"left carousel-control\" href=\"#";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["carousel"] ?? null), "id", [])), "html", null, true));
            echo "\" role=\"button\" data-slide=\"prev\">
                <span class=\"icon-prev\"></span>
                <span class=\"sr-only\">";
            // line 53
            echo t("Previous", array());
            echo "</span>
              </a>
              <a class=\"right carousel-control\" href=\"#";
            // line 55
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["carousel"] ?? null), "id", [])), "html", null, true));
            echo "\" role=\"button\" data-slide=\"next\">
                <span class=\"icon-next\"></span>
                <span class=\"sr-only\">";
            // line 57
            echo t("Next", array());
            echo "</span>
              </a>
              ";
        }
        // line 60
        echo "            </div>

            ";
        // line 62
        if ((twig_length_filter($this->env, $this->getAttribute(($context["thumbnails"] ?? null), "images", [])) > 1)) {
            // line 63
            echo "            <ol class=\"carousel-indicators\">
              ";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, $this->getAttribute(($context["carousel"] ?? null), "images", [])) - 1)));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["index"]) {
                // line 65
                echo "                <li data-target=\"#";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["carousel"] ?? null), "id", [])), "html", null, true));
                echo "\" data-slide-to=\"";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar($this->env->getExtension('Drupal\flag\TwigExtension\FlagCount')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["index"]), "html", null, true));
                echo "\" class=\"";
                if ($this->getAttribute($context["loop"], "first", [])) {
                    echo "active";
                }
                echo "\"></li>
              ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['index'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "            </ol>
            ";
        }
        // line 69
        echo "
          </div>
        </div>

        <div class=\"modal-footer\">
          <button class=\"btn btn-secondary\" data-dismiss=\"modal\" value=\"Close\">";
        // line 74
        echo t("Close", array());
        echo "</button>
        </div>
      </div>
    </div>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "modules/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  270 => 74,  263 => 69,  259 => 67,  236 => 65,  219 => 64,  216 => 63,  214 => 62,  210 => 60,  204 => 57,  199 => 55,  194 => 53,  188 => 51,  186 => 50,  183 => 49,  166 => 46,  162 => 45,  153 => 44,  136 => 43,  124 => 40,  114 => 35,  103 => 31,  100 => 30,  96 => 28,  87 => 25,  76 => 24,  72 => 23,  69 => 22,  67 => 21,  60 => 19,  55 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig", "/home/vietquang/public_html/modules/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig");
    }
}
