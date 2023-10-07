<?php
require('fpdf.php');

class PDF extends FPDF {
    function Header() {
        global $title;

        $this->setFont("Courier", 'I', 14);
        $this->setDrawColor(180, 180, 180);
        //$this->setFillColor(0, 60, 60);
        $this->setTextColor(180, 180, 180);
        //$this->setLineWidth(1);

        $width = $this->getStringWidth($title) + 48;
        $this->cell($width, 15, $title, 1, 1, 'C');
        $this->ln(5);
    }

    function Footer() {
        $this->setY(-15);
        $this->setFont("Courier", 'I', 8);
        $this->cell(0, 10, "Created by: Pj Ellis / Page {$this->pageNo()} of {nb}", 0, 0, 'R');
    }
}
$title = "Pj Ellis - 09/27/2023 - CSD440 - Module 11 - PDF";

// Create a new PDF instance
$pdf = new PDF();
$pdf->aliasNbPages();
$pdf->AddPage();

// Fetch data from the database
$host = 'localhost';
$user = 'student1';
$password = 'pass';
$database = 'baseball_01';

// Create a connection to the database
$connection = new mysqli($host, $user, $password, $database);
$sql = "SELECT * FROM BroadwayShows";
$result = $connection->query($sql);

// Get the image dimensions
list($imageOriginalWidth, $imageOriginalHeight) = getimagesize("broadway.png");
$imageWidth = ($imageOriginalWidth /6);
$imageHeight = ($imageOriginalHeight /6);

// Calculate horizontal position to center the image
$x = ($pdf->GetPageWidth() - $imageWidth) / 2;

// Add the image to the PDF
$pdf->Image("broadway.png", $x, 30, $imageWidth, $imageHeight);

// Add general information
$pdf->ln(50);
$generalInfo = "Broadway is often considered the pinnacle of American theater, and Broadway shows are a quintessential part of New York City's cultural landscape. These theatrical productions are known for their grandeur, world-class performances, and captivating storytelling. Broadway shows are not only a source of entertainment but also a significant economic driver for New York City. They attract tourists from around the world, contribute to the local economy, and provide employment opportunities for many people.";
$pdf->SetFont('Helvetica', '', 14); 
$pdf->MultiCell(0, 10, $generalInfo);

// Title of Table
$pdf->setFont('Courier', 'IB', 45);
$pdf->setFillColor(150, 2, 6);
$pdf->setTextColor(255, 255, 255);
$pdf->Cell(0, 20, 'Broadway Shows', 1, 1, 'C', 1);

// Create the data table
$pdf->SetFont('Helvetica', 'B', 10);
$pdf->SetFillColor(255, 255, 0);
$pdf->setTextColor(0, 0, 0); 

$pdf->Cell(70, 10, 'Title', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Genre', 1, 0, 'C', 1);
$pdf->Cell(30, 10, 'Opening Date', 1, 0, 'C', 1);
$pdf->Cell(35, 10, 'Box Office Revenue', 1, 0, 'C', 1);
$pdf->Cell(25, 10, 'Still Running', 1, 0, 'C', 1);
$pdf->Ln(); // Move to the next row

$oddRowColor = array(192, 192, 192); // Light gray
$evenRowColor = array(255, 255, 255);  // White

// Initialize the row index
$rowIndex = 0;

while ($row = $result->fetch_assoc()) {
    $pdf->SetFont('Helvetica', '', 8);
    $pdf->setTextColor(0, 0, 0);
    $pdf->setDrawColor(0, 0, 0);

    // Determine the fill color based on the row index
    $fillColor = ($rowIndex % 2 == 0) ? $evenRowColor : $oddRowColor;

    // Set the fill color for the row
    $pdf->SetFillColor($fillColor[0], $fillColor[1], $fillColor[2]);

    // Create the row cells here
    $pdf->Cell(70, 10, $row['Title'], 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $row['Genre'], 1, 0, 'C', 1);
    $pdf->Cell(30, 10, $row['OpeningDate'], 1, 0, 'C', 1);
    $pdf->Cell(35, 10, '$' . number_format($row['BoxOfficeRevenue'], 2), 1, 0, 'C', 1);
    $pdf->Cell(25, 10, ($row['StillRunning'] == 1) ? 'Yes' : 'No', 1, 0, 'C', 1);
    $pdf->Ln();

    // Move to the next row
    $rowIndex++;
}

// Output the PDF for download
$pdf->Output();
?>