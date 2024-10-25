<?php
$produit1 = ["nom" => "Livre", "prix" => 15, "quantite" => 2];
$produit2 = ["nom" => "Stylo", "prix" => 3, "quantite" => 5];
$produit3 = ["nom" => "Sac", "prix" => 25, "quantite" => 1];

function calculerSousTotal($produit) {
    return $produit['prix'] * $produit['quantite'];
}

$panier = [$produit1, $produit2, $produit3];
$total = 0;
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Panier d'achat</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Votre panier</h1>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Sous-total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($panier as $produit) {
                $sous_total = calculerSousTotal($produit);
                $total += $sous_total;
                ?>
                <tr>
                    <td><?php echo $produit['nom']; ?></td>
                    <td><?php echo $produit['prix']; ?> €</td>
                    <td><?php echo $produit['quantite']; ?></td>
                    <td><?php echo $sous_total; ?> €</td>
                </tr>
                <?php
                echo "<p>Le sous-total pour le " . $produit['nom'] . " est de " . $sous_total . " €</p>";
            }
            ?>
        </tbody>
    </table>

    <?php
    $montant_final = $total;
    if ($total > 50) {
        $reduction = $total * 0.1;
        $montant_final = $total - $reduction;
        echo "<p>Une réduction de 10% a été appliquée !</p>";
        echo "<p>Montant de la réduction : " . $reduction . " €</p>";
    }
    ?>

    <p class="total">Total du panier : <?php echo $total; ?> €</p>
    <?php if ($total > 50): ?>
        <p class="total">Montant après réduction : <?php echo $montant_final; ?> €</p>
    <?php endif; ?>

</body>
</html>