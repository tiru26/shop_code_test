<?php
namespace Arden;

class TopProductsModel extends Model
{
    public function __construct()
    {
        $this->data = [
            'products' => ['APPLE', 'DELL', 'HP', 'VAIO', 'LENOVO'],
            'images' => [
                'APPLE' => 'https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336373_960_720.jpg',
                'DELL' => 'https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336373_960_720.jpg',
                'HP' => 'https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336373_960_720.jpg',
                'VAIO' => 'https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336373_960_720.jpg',
                'LENOVO' => 'https://cdn.pixabay.com/photo/2014/05/02/21/49/home-office-336373_960_720.jpg'
            ]
        ];
    }

    public function getData()
    {
        $conn = mysqli_connect("localhost", "root", "test", "db123") or die("Connection Error: " . mysqli_error($conn));

        foreach ($this->data['images'] as $key=>$value) {
            if (!empty($key) && !empty($value)) {
                mysqli_query($conn, "INSERT INTO tblproducts (pro_name, pro_img) VALUES ('" . $key. "', '" . $value. "')");
            }
        }

        return $this->data;
    }
}