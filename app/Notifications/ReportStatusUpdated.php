<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\Report; // Pastikan ini ada

class ReportStatusUpdated extends Notification
{
    use Queueable;

    public $report;

    // Konstruktor untuk menerima data report
    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    // Menentukan channel notifikasi
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    // Isi email
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Status laporan Anda telah diperbarui.')
            ->action('Lihat Laporan', url('/reports/' . $this->report->id))
            ->line('Terima kasih!');
    }

    // Representasi array notifikasi
    public function toArray(object $notifiable): array
    {
        return [
            'report_id' => $this->report->id,
            'status' => $this->report->status,
        ];
    }
}