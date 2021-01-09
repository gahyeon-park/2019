using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Heal_Me
{
    public partial class MainForm : Form
    {
        public static int max;

        public MainForm()
        {
            if(max < Heal_Me.InGame.targetAmountNum)
            {
                max = Heal_Me.InGame.targetAmountNum;
            }
            InitializeComponent();
        }

        private void MainForm_Paint(object sender, PaintEventArgs e)
        {
            
        }

        private void StartButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            InGame f = new Heal_Me.InGame();
            f.ShowDialog();
            this.Close();

            
        }

        private void ContinueButton_Click(object sender, EventArgs e)
        {
            InGame f = new Heal_Me.InGame();
            f.ShowDialog();

        }

        private void MainForm_Load(object sender, EventArgs e)
        {
            if (max < Heal_Me.InGame.targetAmountNum)
            {
                max = Heal_Me.InGame.targetAmountNum;
            }
            MaxScore.Text = max.ToString();
        }

        private void HowToPlayButton_Click(object sender, EventArgs e)
        {
            HowToPlay f = new Heal_Me.HowToPlay();
            f.ShowDialog();
        }
    }
}
