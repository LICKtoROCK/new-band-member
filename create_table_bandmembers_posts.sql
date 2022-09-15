CREATE TABLE posts (
    id INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    name VARCHAR(50) NOT NULL,
    prefectures VARCHAR(20) NOT NULL,
    parts SET('ボーカル', 'ギターボーカル', 'ギター', 'ベース', 'ドラム', 'キーボード', '管楽器', '弦楽器', 'ＤＪ', 'その他') NOT NULL,
    pr VARCHAR(500) NOT NULL
);