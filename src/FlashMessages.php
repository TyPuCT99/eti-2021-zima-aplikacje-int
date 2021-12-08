<?php


namespace App;


class FlashMessages
{
    /**
     * @var array
     */
    private array $messages;

    /**
     * @return bool
     */
    public function hasMessages()
    {
        return !empty($this->messages);
    }

    /**
     * @param string $message
     * @param string $type
     */
    public function addMessage(string $message, string $type)
    {
        array_push($this->messages, [
            'message' => $message,
            'type' => $type
        ]);
    }

    /**
     * @return array
     */
    public function getMessages()
    {
        $messages = $this->messages;

        unset($this->messages);

        return $messages;
    }
}