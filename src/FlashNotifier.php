<?php
namespace Mds\Flash;

use Illuminate\Session\Store as SessionStore;

class FlashNotifier
{

    /**
     * @var SessionStore
     */
    private $session;

    /**
     * @param SessionStore $session
     */
    function __construct(SessionStore $session)
    {
        $this->session = $session;
    }

    /**
     * @param string|array $message
     */
    public function info($message)
    {
        $this->message($message, 'info');
    }

    /**
     * @param string|array $message
     */
    public function success($message)
    {
        $this->message($message, 'success');
    }

    /**
     * @param string|array $message
     */
    public function error($message)
    {
        $this->message($message, 'danger');
    }

    /**
     * @param string|array $message
     */
    public function warning($message)
    {
        $this->message($message, 'warning');
    }

    /**
     * @param string|array $message
     * @param string $level
     */
    public function message($message, $level = 'info')
    {
        $this->session->ageFlashData();
        $notifications = $this->session->get('flash_notifications', []);
        $notifications[] = ['message' => $message, 'level' => $level];
        $this->session->flash('flash_notifications', $notifications);
    }
}
