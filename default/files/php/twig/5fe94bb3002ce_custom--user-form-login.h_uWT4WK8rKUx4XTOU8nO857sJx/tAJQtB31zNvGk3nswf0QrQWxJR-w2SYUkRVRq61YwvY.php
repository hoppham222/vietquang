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

/* sites/all/themes/giaidieu/templates/custom/custom--user-form-login.html.twig */
class __TwigTemplate_7378e6bcc7a1b09f8f7bb39da9f0edc0ae16ed1c1257ea9b92fb4a6d6345aaaf extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = [];
        $filters = [];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
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
        // line 1
        echo "<div id=\"custom-user-login-form-wrapper\">
  <div class=\"login-form-wrapper\">
    <input type=\"text\" name=\"username\" value=\"\" placeholder=\"Tên truy nhập, E-mail, hoặc Số điện thoại *\" class=\"form-control\" />
    <input type=\"password\" name=\"password\" value=\"\" placeholder=\"Mật khẩu của bạn *\" class=\"form-control\" />
    <input type=\"submit\" name=\"submit\" value=\"Đăng nhập\" class=\"btn btn-primary form-control\" onclick=\"custom_user_smart_login(this); return false;\" />
    <p class=\"custom-pass-link\"><a href=\"/user/password\">Quên mật khẩu?</a></p>
    <p class=\"custom-or\">Hoặc</p>
    <p class=\"custom-social-link facebook\"><a class=\"btn btn-fb\" href=\"/user/login/facebook\">Đăng nhập Facebook</a></p><p class=\"custom-social-link google\"><a class=\"btn btn-google\" href=\"/user/login/google\">Đăng nhập Google</a></p>
    <p class=\"custom-register-link\">Bạn chưa có tài khoản? <a href=\"/user/register\">Đăng ký ngay</a></p>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "sites/all/themes/giaidieu/templates/custom/custom--user-form-login.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  55 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "sites/all/themes/giaidieu/templates/custom/custom--user-form-login.html.twig", "/home/vietquang/public_html/sites/all/themes/giaidieu/templates/custom/custom--user-form-login.html.twig");
    }
}
