<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Report;

class ReportChanged extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($parameters)
    {
        $this->parameters = $parameters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        $report = Report::find($this->parameters['report_id']);

        $data = [
            'username' => 'Administrador',
            'action'   => 'actualizado',
            'report'   => $report,
        ];

        $mail = $this->view('Mails.report_notification',$data)
                     ->from('sgi@ach.cdmx.gob.mx')
                     ->subject('Reporte actualizado')
                     /*->attachData($this->parameters['attachment'], $this->parameters['filename'], [
                        'mime' => 'application/pdf',
                     ])*/

                     ;

        return $mail;
    }
}
