<?php

namespace Source\App;

use Source\Core\Controller;
use Source\Support\Pager;

/**
 * Web Controller
 * @package Source\App
 */
class TimeController extends Controller
{
    /**
     * Web constructor.
     */
    public function __construct()
    {
        parent::__construct(__DIR__ . "/../../resources/" . CONF_VIEW_THEME . "/");
    }

    /**
     * SITE HOME
     */
    public function clockIn(): void
    {
        $head = $this->seo->render(
            CONF_SITE_NAME . " - " . CONF_SITE_TITLE,
            CONF_SITE_DESC,
            url(),
            asset("/assets/images/share.jpg")
        );

        echo $this->view->render("home", [
            "head" => $head
        ]);
    }

    /**
     * 
     */
    public function clockOut() : Returntype 
    {
        
    }

    /**
     * 
     */
    public function history() : Returntype 
    {
        
    }

    /**
     * 
     */
    public function profile() : Returntype 
    {

    }
    
    /**
     * 
     */
    public function settings() : Returntype 
    {
        
    }

    /**
     * 
     */
    public function logout() : Returntype 
    {
        
    }

    /**
     * ERROR
     * @param array $data
     */
    public function error(array $data): void
    {
        $error = new \stdClass();

        switch ($data['errcode']) {
            case "problemas":
                $error->code = "OPS";
                $error->title = "Estamos enfrentando problemas!";
                $error->message = "Parece que nosso serviço não está diponível no momento. Já estamos vendo isso mas caso precise, envie um e-mail :)";
                $error->linkTitle = "ENVIAR E-MAIL";
                $error->link = "mailto:" . CONF_MAIL_SUPPORT;
                break;

            case "manutencao":
                $error->code = "OPS";
                $error->title = "Desculpe. Estamos em manutenção!";
                $error->message = "Voltamos logo! Por hora estamos trabalhando para melhorar nosso conteúdo para você controlar melhor as suas contas :P";
                $error->linkTitle = null;
                $error->link = null;
                break;

            default:
                $error->code = $data['errcode'];
                $error->title = "Ooops. Conteúdo indispinível :/";
                $error->message = "Sentimos muito, mas o conteúdo que você tentou acessar não existe, está indisponível no momento ou foi removido :/";
                $error->linkTitle = "Continue navegando!";
                $error->link = url_back();
                break;
        }

        $head = $this->seo->render(
            "{$error->code} | {$error->title}",
            $error->message,
            url("/ops/{$error->code}"),
            asset("/assets/images/share.jpg"),
            false
        );

        echo $this->view->render("error", [
            "head" => $head,
            "error" => $error
        ]);
    }
}