namespace Heal_Me
{
    partial class MainForm
    {
        /// <summary>
        /// 필수 디자이너 변수입니다.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// 사용 중인 모든 리소스를 정리합니다.
        /// </summary>
        /// <param name="disposing">관리되는 리소스를 삭제해야 하면 true이고, 그렇지 않으면 false입니다.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form 디자이너에서 생성한 코드

        /// <summary>
        /// 디자이너 지원에 필요한 메서드입니다. 
        /// 이 메서드의 내용을 코드 편집기로 수정하지 마세요.
        /// </summary>
        private void InitializeComponent()
        {
            this.MainTitle01 = new System.Windows.Forms.Label();
            this.MainTitle02 = new System.Windows.Forms.Label();
            this.MainTitle03 = new System.Windows.Forms.Label();
            this.MainTitle04 = new System.Windows.Forms.Label();
            this.MainTitle05 = new System.Windows.Forms.Label();
            this.MainTitle06 = new System.Windows.Forms.Label();
            this.MainTitle07 = new System.Windows.Forms.Label();
            this.MaxScore = new System.Windows.Forms.Label();
            this.MaxScoreLabel = new System.Windows.Forms.Label();
            this.StartButton = new System.Windows.Forms.Button();
            this.HowToPlayButton = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // MainTitle01
            // 
            this.MainTitle01.AutoSize = true;
            this.MainTitle01.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle01.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(64)))), ((int)(((byte)(64)))));
            this.MainTitle01.Location = new System.Drawing.Point(31, 134);
            this.MainTitle01.Name = "MainTitle01";
            this.MainTitle01.Size = new System.Drawing.Size(72, 50);
            this.MainTitle01.TabIndex = 0;
            this.MainTitle01.Text = "진";
            // 
            // MainTitle02
            // 
            this.MainTitle02.AutoSize = true;
            this.MainTitle02.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle02.ForeColor = System.Drawing.Color.Teal;
            this.MainTitle02.Location = new System.Drawing.Point(99, 134);
            this.MainTitle02.Name = "MainTitle02";
            this.MainTitle02.Size = new System.Drawing.Size(72, 50);
            this.MainTitle02.TabIndex = 1;
            this.MainTitle02.Text = "찰";
            // 
            // MainTitle03
            // 
            this.MainTitle03.AutoSize = true;
            this.MainTitle03.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle03.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(0)))), ((int)(((byte)(192)))), ((int)(((byte)(192)))));
            this.MainTitle03.Location = new System.Drawing.Point(162, 134);
            this.MainTitle03.Name = "MainTitle03";
            this.MainTitle03.Size = new System.Drawing.Size(72, 50);
            this.MainTitle03.TabIndex = 2;
            this.MainTitle03.Text = "해";
            // 
            // MainTitle04
            // 
            this.MainTitle04.AutoSize = true;
            this.MainTitle04.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle04.ForeColor = System.Drawing.Color.Aqua;
            this.MainTitle04.Location = new System.Drawing.Point(228, 134);
            this.MainTitle04.Name = "MainTitle04";
            this.MainTitle04.Size = new System.Drawing.Size(72, 50);
            this.MainTitle04.TabIndex = 3;
            this.MainTitle04.Text = "주";
            // 
            // MainTitle05
            // 
            this.MainTitle05.AutoSize = true;
            this.MainTitle05.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle05.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(128)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.MainTitle05.Location = new System.Drawing.Point(296, 134);
            this.MainTitle05.Name = "MainTitle05";
            this.MainTitle05.Size = new System.Drawing.Size(72, 50);
            this.MainTitle05.TabIndex = 4;
            this.MainTitle05.Text = "세";
            // 
            // MainTitle06
            // 
            this.MainTitle06.AutoSize = true;
            this.MainTitle06.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle06.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.MainTitle06.Location = new System.Drawing.Point(358, 134);
            this.MainTitle06.Name = "MainTitle06";
            this.MainTitle06.Size = new System.Drawing.Size(72, 50);
            this.MainTitle06.TabIndex = 5;
            this.MainTitle06.Text = "요";
            // 
            // MainTitle07
            // 
            this.MainTitle07.AutoSize = true;
            this.MainTitle07.Font = new System.Drawing.Font("HY산B", 30F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MainTitle07.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.MainTitle07.Location = new System.Drawing.Point(421, 134);
            this.MainTitle07.Name = "MainTitle07";
            this.MainTitle07.Size = new System.Drawing.Size(40, 50);
            this.MainTitle07.TabIndex = 6;
            this.MainTitle07.Text = "!";
            // 
            // MaxScore
            // 
            this.MaxScore.BackColor = System.Drawing.Color.DarkOrange;
            this.MaxScore.Font = new System.Drawing.Font("HY산B", 16.2F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MaxScore.ForeColor = System.Drawing.Color.White;
            this.MaxScore.Location = new System.Drawing.Point(155, 299);
            this.MaxScore.Name = "MaxScore";
            this.MaxScore.Size = new System.Drawing.Size(158, 51);
            this.MaxScore.TabIndex = 7;
            this.MaxScore.Text = "0";
            this.MaxScore.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // MaxScoreLabel
            // 
            this.MaxScoreLabel.AutoSize = true;
            this.MaxScoreLabel.Font = new System.Drawing.Font("HY산B", 10.8F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MaxScoreLabel.Location = new System.Drawing.Point(184, 269);
            this.MaxScoreLabel.Name = "MaxScoreLabel";
            this.MaxScoreLabel.Size = new System.Drawing.Size(91, 19);
            this.MaxScoreLabel.TabIndex = 8;
            this.MaxScoreLabel.Text = "최고 점수";
            // 
            // StartButton
            // 
            this.StartButton.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.StartButton.FlatAppearance.BorderColor = System.Drawing.Color.Teal;
            this.StartButton.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Teal;
            this.StartButton.Font = new System.Drawing.Font("HY산B", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.StartButton.Location = new System.Drawing.Point(75, 459);
            this.StartButton.Name = "StartButton";
            this.StartButton.Size = new System.Drawing.Size(328, 94);
            this.StartButton.TabIndex = 9;
            this.StartButton.Text = "시작 하기";
            this.StartButton.UseVisualStyleBackColor = false;
            this.StartButton.Click += new System.EventHandler(this.StartButton_Click);
            // 
            // HowToPlayButton
            // 
            this.HowToPlayButton.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(192)))), ((int)(((byte)(255)))), ((int)(((byte)(255)))));
            this.HowToPlayButton.FlatAppearance.BorderColor = System.Drawing.Color.Teal;
            this.HowToPlayButton.FlatAppearance.MouseDownBackColor = System.Drawing.Color.Teal;
            this.HowToPlayButton.Font = new System.Drawing.Font("HY산B", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.HowToPlayButton.Location = new System.Drawing.Point(160, 589);
            this.HowToPlayButton.Name = "HowToPlayButton";
            this.HowToPlayButton.Size = new System.Drawing.Size(153, 45);
            this.HowToPlayButton.TabIndex = 10;
            this.HowToPlayButton.Text = "게임 방법";
            this.HowToPlayButton.UseVisualStyleBackColor = false;
            this.HowToPlayButton.Click += new System.EventHandler(this.HowToPlayButton_Click);
            // 
            // MainForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 15F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.SystemColors.Window;
            this.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.ClientSize = new System.Drawing.Size(482, 753);
            this.Controls.Add(this.HowToPlayButton);
            this.Controls.Add(this.StartButton);
            this.Controls.Add(this.MaxScoreLabel);
            this.Controls.Add(this.MaxScore);
            this.Controls.Add(this.MainTitle07);
            this.Controls.Add(this.MainTitle06);
            this.Controls.Add(this.MainTitle05);
            this.Controls.Add(this.MainTitle04);
            this.Controls.Add(this.MainTitle03);
            this.Controls.Add(this.MainTitle02);
            this.Controls.Add(this.MainTitle01);
            this.DoubleBuffered = true;
            this.Name = "MainForm";
            this.Text = "HealMe";
            this.Load += new System.EventHandler(this.MainForm_Load);
            this.Paint += new System.Windows.Forms.PaintEventHandler(this.MainForm_Paint);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label MainTitle01;
        private System.Windows.Forms.Label MainTitle02;
        private System.Windows.Forms.Label MainTitle03;
        private System.Windows.Forms.Label MainTitle04;
        private System.Windows.Forms.Label MainTitle05;
        private System.Windows.Forms.Label MainTitle06;
        private System.Windows.Forms.Label MainTitle07;
        private System.Windows.Forms.Label MaxScore;
        private System.Windows.Forms.Label MaxScoreLabel;
        private System.Windows.Forms.Button StartButton;
        private System.Windows.Forms.Button HowToPlayButton;
    }
}

