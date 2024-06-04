<!DOCTYPE html>
<html>
<head>
    <title>模擬試験結果表示</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>模擬試験結果</h1>
    <table border="1">
        <tr>
            <th>名前</th>
            <th>文法問題1の回答</th>
            <th>文法問題2の回答</th>
            <th>文法問題3の回答</th>
            <th>文法問題4の回答</th>
            <th>文法問題5の回答</th>
            <th>文法問題6の回答</th>
            <th>文法問題7の回答</th>
            <th>文法問題8の回答</th>
            <th>文法問題9の回答</th>
            <th>文法問題10の回答</th>
            <th>スコア</th>
            <th>試験回数</th>
        </tr>
        <?php
        include 'config.php'; // データベース接続設定をインクルード
        $results = [];
        $sql = "SELECT * FROM results";
        $result = $conn->query($sql);
        while ($row = $result->fetch_assoc()) {
            $results[] = $row;
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['name']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result1']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result2']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result3']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar4']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result4']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar5']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result5']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar6']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result6']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar7']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result7']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar8']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result8']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar9']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result9']) . "</td>";
            echo "<td>" . htmlspecialchars($row['grammar10']) . "</td>";
            echo "<td>" . htmlspecialchars($row['result10']) . "</td>";
            echo "<td>" . htmlspecialchars($row['score']) . "</td>";
            echo "<td>" . htmlspecialchars($row['attempt_count']) . "</td>";
            echo "</tr>";
        }
        $conn->close();
        ?>
    </table>

    <h2>過去の結果</h2>
    <canvas id="resultsChart"></canvas>
    <script>
        const results = <?php echo json_encode($results); ?>;
        const labels = [];
        const scores = [];
        
        results.forEach(result => {
            labels.push("試験 " + result['attempt_count']);
            scores.push(parseInt(result['score']));
        });

        const ctx = document.getElementById('resultsChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'スコア',
                    data: scores,
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>

    <h2>もう一度挑戦する</h2>
    <a href="post.php">再挑戦</a>
</body>
</html>
