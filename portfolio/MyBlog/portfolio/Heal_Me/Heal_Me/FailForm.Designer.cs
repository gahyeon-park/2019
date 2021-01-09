namespace Heal_Me
{
    partial class FailForm
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            this.GameOverLabel = new System.Windows.Forms.Label();
            this.ContinueButton = new System.Windows.Forms.Button();
            this.ExitButton = new System.Windows.Forms.Button();
            this.ReceiveLabel = new System.Windows.Forms.Label();
            this.ReceiveNumLabel = new System.Windows.Forms.Label();
            this.MaxLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // GameOverLabel
            // 
            this.GameOverLabel.AutoSize = true;
            this.GameOverLabel.Font = new System.Drawing.Font("HY산B", 20F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.GameOverLabel.Location = new System.Drawing.Point(53, 58);
            this.GameOverLabel.Name = "GameOverLabel";
            this.GameOverLabel.Size = new System.Drawing.Size(210, 34);
            this.GameOverLabel.TabIndex = 0;
            this.GameOverLabel.Text = "GAME OVER!";
            // 
            // ContinueButton
            // 
            this.ContinueButton.AutoSize = true;
            this.ContinueButton.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(192)))));
            this.ContinueButton.Font = new System.Drawing.Font("HY산B", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.ContinueButton.Location = new System.Drawing.Point(26, 233);
            this.ContinueButton.Name = "ContinueButton";
            this.ContinueButton.Size = new System.Drawing.Size(119, 30);
            this.ContinueButton.TabIndex = 1;
            this.ContinueButton.Text = "continue?";
            this.ContinueButton.UseVisualStyleBackColor = false;
            this.ContinueButton.Click += new System.EventHandler(this.ContinueButton_Click);
            // 
            // ExitButton
            // 
            this.ExitButton.AutoSize = true;
            this.ExitButton.BackColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(192)))), ((int)(((byte)(192)))));
            this.ExitButton.Font = new System.Drawing.Font("HY산B", 12F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.ExitButton.Location = new System.Drawing.Point(184, 233);
            this.ExitButton.Name = "ExitButton";
            this.ExitButton.Size = new System.Drawing.Size(119, 30);
            this.ExitButton.TabIndex = 2;
            this.ExitButton.Text = "exit?";
            this.ExitButton.UseVisualStyleBackColor = false;
            this.ExitButton.Click += new System.EventHandler(this.ExitButton_Click);
            // 
            // ReceiveLabel
            // 
            this.ReceiveLabel.AutoSize = true;
            this.ReceiveLabel.Font = new System.Drawing.Font("HY산B", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.ReceiveLabel.ForeColor = System.Drawing.Color.DimGray;
            this.ReceiveLabel.Location = new System.Drawing.Point(43, 136);
            this.ReceiveLabel.Name = "ReceiveLabel";
            this.ReceiveLabel.Size = new System.Drawing.Size(152, 25);
            this.ReceiveLabel.TabIndex = 7;
            this.ReceiveLabel.Text = "접수자 수  : ";
            this.ReceiveLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // ReceiveNumLabel
            // 
            this.ReceiveNumLabel.AutoSize = true;
            this.ReceiveNumLabel.Font = new System.Drawing.Font("HY산B", 15F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.ReceiveNumLabel.ForeColor = System.Drawing.Color.DimGray;
            this.ReceiveNumLabel.Location = new System.Drawing.Point(215, 136);
            this.ReceiveNumLabel.Name = "ReceiveNumLabel";
            this.ReceiveNumLabel.Size = new System.Drawing.Size(72, 25);
            this.ReceiveNumLabel.TabIndex = 8;
            this.ReceiveNumLabel.Text = "NONE";
            this.ReceiveNumLabel.TextAlign = System.Drawing.ContentAlignment.MiddleCenter;
            // 
            // MaxLabel
            // 
            this.MaxLabel.AutoSize = true;
            this.MaxLabel.Font = new System.Drawing.Font("HY산B", 12F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(129)));
            this.MaxLabel.ForeColor = System.Drawing.Color.FromArgb(((int)(((byte)(255)))), ((int)(((byte)(128)))), ((int)(((byte)(128)))));
            this.MaxLabel.Location = new System.Drawing.Point(22, 106);
            this.MaxLabel.Name = "MaxLabel";
            this.MaxLabel.Size = new System.Drawing.Size(80, 20);
            this.MaxLabel.TabIndex = 9;
            this.MaxLabel.Text = "신기록!";
            this.MaxLabel.Visible = false;
            // 
            // FailForm
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 15F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackColor = System.Drawing.Color.White;
            this.ClientSize = new System.Drawing.Size(331, 301);
            this.Controls.Add(this.MaxLabel);
            this.Controls.Add(this.ReceiveNumLabel);
            this.Controls.Add(this.ReceiveLabel);
            this.Controls.Add(this.ExitButton);
            this.Controls.Add(this.ContinueButton);
            this.Controls.Add(this.GameOverLabel);
            this.DoubleBuffered = true;
            this.Name = "FailForm";
            this.Text = "FailForm";
            this.Load += new System.EventHandler(this.FailForm_Load);
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label GameOverLabel;
        private System.Windows.Forms.Button ContinueButton;
        private System.Windows.Forms.Button ExitButton;
        private System.Windows.Forms.Label ReceiveLabel;
        private System.Windows.Forms.Label ReceiveNumLabel;
        private System.Windows.Forms.Label MaxLabel;
    }
}