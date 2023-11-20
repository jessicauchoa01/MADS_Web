<?php
namespace GoEat;

interface Mailable
{
    public function getDestination(): string;
    public function getSubject(): string;
    public function getBody(): string;
}