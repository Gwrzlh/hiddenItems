<?php

// grid game
$grid = [
    ['.', '.', '.', '#', '.'],
    ['.', '#', '.', '.', '.'],
    ['.', '.', '.', '#', '.'],
    ['.', '#', 'X', '.', '.'], 
    ['.', '.', '.', '.', '#'],
];


$rStart = -1;
$cStart = -1;
foreach ($grid as $r => $row) {
    foreach ($row as $c => $val) {
        if ($val === 'X') {
            $rStart = $r; // Indeks Baris (Y)
            $cStart = $c; // Indeks Kolom (X)
        }
    }
}

echo "=== WELCOME TO HIDDEN ITEM GAME ===\n";
echo "Initial Grid Layout:\n";
printGrid($grid);
echo "-----------------------------------\n\n";
//langkah Awal menginput angka
echo "Masukkan jumlah langkah ke Atas / North (A): ";
$stepA = (int) trim(fgets(STDIN));

echo "Masukkan jumlah langkah ke Kanan / East (B): ";
$stepB = (int) trim(fgets(STDIN));

echo "Masukkan jumlah langkah ke Bawah / South (C): ";
$stepC = (int) trim(fgets(STDIN));

// mencari posisi sekarang
$currentPositions = [[$rStart, $cStart]];

// posisi setelah langkah A
$positionsAfterA = [];
foreach ($currentPositions as $pos) {
    $r = $pos[0];
    $c = $pos[1];
    $valid = true;
    
    for ($i = 1; $i <= $stepA; $i++) {
        $nextR = $r - $i;
        if ($nextR < 0 || $grid[$nextR][$c] === '#') {
            $valid = false;
            break;
        }
    }
    if ($valid) {
        $positionsAfterA[] = [$r - $stepA, $c];
    }
}

// posisi langkah setelah input B
$positionsAfterB = [];
foreach ($positionsAfterA as $pos) {
    $r = $pos[0];
    $c = $pos[1];
    $valid = true;
    
    for ($i = 1; $i <= $stepB; $i++) {
        $nextC = $c + $i;
        if ($nextC >= count($grid[0]) || $grid[$r][$nextC] === '#') {
            $valid = false;
            break;
        }
    }
    if ($valid) {
        $positionsAfterB[] = [$r, $c + $stepB];
    }
}
// hasil dari semua langkah final position
$finalPositions = [];
foreach ($positionsAfterB as $pos) {
    $r = $pos[0];
    $c = $pos[1];
    $valid = true;
    
    for ($i = 1; $i <= $stepC; $i++) {
        $nextR = $r + $i;
        if ($nextR >= count($grid) || $grid[$nextR][$c] === '#') {
            $valid = false;
            break;
        }
    }
    if ($valid) {
        $finalPositions[] = [$r + $stepC, $c];
    }
}

echo "\n====================================\n";
echo "Titik Koordinat Kemungkinan:\n";

if (empty($finalPositions)) {
    echo "Tidak ada koordinat yang cocok (Langkah terhalang tembok atau keluar batas grid).\n";
} else {
    $finalPositions = array_map("unserialize", array_unique(array_map("serialize", $finalPositions)));
    
    foreach ($finalPositions as $pos) {
        echo "-> (Row: {$pos[0]}, Col: {$pos[1]})\n";
        
        if ($grid[$pos[0]][$pos[1]] === '.') {
            $grid[$pos[0]][$pos[1]] = '$';
        }
    }
}

echo "\n=== KISI-KISI DENGAN PERKIRAAN LOKASI ($) ===\n";
printGrid($grid);

function printGrid($matrix) {
    foreach ($matrix as $row) {
        echo implode(' ', $row) . "\n";
    }
}