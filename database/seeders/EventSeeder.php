<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    public function run(): void
    {
        $events = [
            [
                'title' => 'Web Development with Laravel & Vue.js',
                'speaker' => 'รศ.ดร. สมชาย วงศ์ประเสริฐ',
                'location' => 'ห้อง IT-301',
                'total_seats' => 30,
            ],
            [
                'title' => 'Machine Learning for Beginners',
                'speaker' => 'ผศ.ดร. กนกวรรณ สุวรรณภูมิ',
                'location' => 'ห้อง AI-101',
                'total_seats' => 25,
            ],
            [
                'title' => 'Mobile App Development with Flutter',
                'speaker' => 'อ. ธนกร รัตนวิชัย',
                'location' => 'ห้อง CS-205',
                'total_seats' => 35,
            ],
            [
                'title' => 'Cybersecurity & Ethical Hacking',
                'speaker' => 'รศ. ประยุทธ เจริญวงศ์',
                'location' => 'ห้อง SEC-401',
                'total_seats' => 20,
            ],
            [
                'title' => 'Cloud Computing with AWS & Docker',
                'speaker' => 'ดร. พิชัย ทองดี',
                'location' => 'ห้อง NET-102',
                'total_seats' => 40,
            ],
            [
                'title' => 'UI/UX Design Principles & Figma',
                'speaker' => 'อ. สุภาวดี สมิตสันต์',
                'location' => 'ห้อง DES-201',
                'total_seats' => 30,
            ],
        ];

        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
