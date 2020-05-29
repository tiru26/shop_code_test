<?php
namespace Arden;

class OpeningTimesModel extends Model
{
    public function __construct()
    {
        $this->data = [
            'days' => ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            'opening_hours' => [
                'Mon' => '0900 - 1700',
                'Tue' => '0900 - 1400',
                'Wed' => 'Closed',
                'Fri' => '1000 - 1300'
            ]
        ];
    }

    public function getData()
    {
		$conn = mysqli_connect("localhost", "root", "test", "db123") or die("Connection Error: " . mysqli_error($conn));

        foreach ($this->data['opening_hours'] as $key=>$value) {
            if (!empty($key) && !empty($value)) {
                mysqli_query($conn, "INSERT INTO tblopeningtime (day, timings) VALUES ('" . $key. "', '" . $value. "')");
            }
        }
		
        return $this->data;
    }
}