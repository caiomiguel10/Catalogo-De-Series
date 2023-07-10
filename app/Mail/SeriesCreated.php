<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
// Mailable quer dizer que e enviavel
class SeriesCreated extends Mailable
{   
    use Queueable, SerializesModels;
  
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(
        public string $nomeSerie,
        public string $idSerie,
        public int $qtdTemporadas,
        public int $qntEpisodes,
    )
    {
        
       $this->subject = "Serie $nomeSerie Craida";

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.series-created');
    }
}
