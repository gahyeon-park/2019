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
    public partial class FailForm : Form
    {
        public FailForm()
        {
            InitializeComponent();
        }

        private void ContinueButton_Click(object sender, EventArgs e)
        {
            this.Hide();
            MainForm f = new Heal_Me.MainForm();
            f.ShowDialog();
            this.Close();
        }

        private void ExitButton_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void FailForm_Load(object sender, EventArgs e)
        {
            ReceiveNumLabel.Text = Heal_Me.InGame.targetAmountNum.ToString();
            if(Heal_Me.MainForm.max < Heal_Me.InGame.targetAmountNum)
            {
                MaxLabel.Visible = true;

            }
            else
            {
                MaxLabel.Visible = false;
            }
        }
    }
}
