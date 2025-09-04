# 生徒健康情報管理システム 設計書

## 1. データベース設計

### 1.1 テーブル構造

#### students テーブル
```sql
CREATE TABLE students (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    name TEXT NOT NULL,
    grade INTEGER NOT NULL, -- 1, 2, 3
    class TEXT NOT NULL,   -- 総合1, 総合2, 総合3, 調理, 福祉, 進学, 特別進学, 情報会計
    created_at TIMESTAMP,
    updated_at TIMESTAMP
);
```

#### health_records テーブル
```sql
CREATE TABLE health_records (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    student_id INTEGER NOT NULL,
    height DECIMAL(4,1) NOT NULL,  -- 身長（cm）
    weight DECIMAL(4,1) NOT NULL,  -- 体重（kg）
    vision_left DECIMAL(3,2),      -- 裸眼視力（左）
    vision_right DECIMAL(3,2),     -- 裸眼視力（右）
    vision_left_corrected DECIMAL(3,2), -- 矯正視力（左）
    vision_right_corrected DECIMAL(3,2), -- 矯正視力（右）
    hearing_test BOOLEAN NOT NULL,  -- false: 異常なし, true: 要検査
    dental_exam BOOLEAN NOT NULL,   -- false: 虫歯無, true: 虫歯有
    recorded_date DATE NOT NULL,    -- 検査日
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE
);
```

## 2. コンポーネント設計

### 2.1 Livewireコンポーネント

#### StudentList
- 生徒一覧の表示
- 検索機能（学年、クラス、生徒名）
- ページネーション
- 新規登録ボタン

#### StudentForm
- 生徒情報の登録・編集フォーム
- バリデーション
- 保存処理

#### HealthRecordForm
- 健康情報の登録・編集フォーム
- バリデーション
- 保存処理

### 2.2 ビュー構成

#### レイアウト
- ヘッダー（タイトル、ナビゲーション）
- メインコンテンツエリア
- レスポンシブデザイン対応

#### ページ構成
1. トップページ（生徒一覧）
   - 検索フィルター
   - 生徒一覧テーブル
   - 新規登録ボタン

2. 生徒情報登録/編集ページ
   - 生徒基本情報フォーム
   - 健康情報フォーム
   - 保存/キャンセルボタン

## 3. UI/UXデザイン

### 3.1 カラースキーム
- プライマリーカラー: インディゴ (#4F46E5)
- セカンダリーカラー: スレート (#64748B)
- アクセントカラー: エメラルド (#10B981)
- 背景色: グレー (#F9FAFB)

### 3.2 レスポンシブデザイン
- モバイル: 〜640px
- タブレット: 641px〜1024px
- デスクトップ: 1025px〜

### 3.3 コンポーネントデザイン
- ボタン、入力フォーム、テーブルなどの共通コンポーネントはTailwind CSSのデフォルトスタイルをベースに統一感のあるデザインを適用
