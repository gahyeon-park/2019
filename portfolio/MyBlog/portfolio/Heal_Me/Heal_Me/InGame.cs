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

    public partial class InGame : Form
    {
        class Person
        {
            public int ID; // 인물 고유 번호
            public Bitmap bitmap;
            public bool[] gender = new bool[1];
            public bool[] hair = new bool[4];
            public bool[] eye = new bool[2];
            public bool[] ear = new bool[1];
            public bool[] mouth = new bool[1];
            public bool[] cloth = new bool[3];

        }
        class Condition
        {
            public int[] gender = new int[1];
            public int[] hair = new int[4];
            public int[] eye = new int[2];
            public int[] ear = new int[1];
            public int[] mouth = new int[1];
            public int[] cloth = new int[3];
            
            // 0 : false
            // 1 : true
            // 2 : empty
        }


        // Ready Start화면
        bool canStart = false;
        int readystartTime = 0;
        int tempT = 0;

        // InGame화면 변수
        int time = 100;                                 // 시간초
        public static int targetAmountNum = 0;          // 목표 접수자 수
        List<Person> People = new List<Person>();       // 현스테이지 나타나야하는 사람들
        Person[] Characters = new Person[36];           // 캐릭터 모음집
        bool isStageClear = true;                       // 스테이지를 클리어 했는지
        Condition condition_Fake_Type = new Condition();// 꾀병 조건
        int wanted = -1;                                // 현재 스테이지의 현상수배범 캐릭터 번호
        int life = 3;                                   // 현재 생명 갯수
        int condition_Fake_Num = 0;                     // 총 추가된 조건 갯수
        bool isOut = false;
        bool isIn = false;
        bool isPolice = false;
        Point peopleXY = new Point();                   // 캐릭터 위치

        //----------------
            
        public InGame()
        {
            setCharacters();
            setInitCondition();
            setCondition_Fake_Add();
            setCondition_Fake_Add();
            setWanted();

            InitializeComponent();
  
        }
        private void InGame_Load(object sender, EventArgs e)
        {
           
            // InGame화면

            GameTimeBar.Value = 100;
            setPeopleBitmap();
            Memo_Label_Load();
            targetAmountNum = 0;

            //----------


        }

        private void GameTimer_Tick(object sender, EventArgs e)
        {
            Success_Fail_Label.Visible = false;

            if (canStart == true)
            {
                if (GameTimeBar.Value != 0)
                {
                    GameTimeBar.Value -= 5;
                    
                }
                if(GameTimeBar.Value <= 0)
                {
                   
                   
                    GameOver();
                }
                
            }
           
            Invalidate();
        }

        private void AniTimer_Tick(object sender, EventArgs e)
        {
            if(canStart == false)
            {
                // Ready Start화면

                ReadyStrarLabel.Visible = true;
                readystartTime++;
                ReadyStart_Ani(readystartTime);

                if(readystartTime > 28)
                {
                    ReadyStrarLabel.Visible = false;
                    canStart = true;
                }
            }

            if(isOut == true)
            {
                if(peopleXY.X > -300)
                {

                peopleXY.X -= 60;
                }
                else
                {
                    peopleXY.X = 0;
                    delPerson();
                    isOut = false;
                }

            }

            if (isIn == true)
            {
                if (peopleXY.X < 300)
                {

                    peopleXY.X += 60;
                }
                else
                {
                    peopleXY.X = 0;
                    delPerson();
                    isIn = false;
                }

            }
            if(isPolice == true)
            {
                if(peopleXY.Y < 100)
                {
                    peopleXY.Y += 35;

                }
                else
                {
                    peopleXY.Y = 0;
                    delPerson();
                    isPolice = false;
                }
            }
            Invalidate();
        }
        private void InGame_Paint(object sender, PaintEventArgs e)
        {
            Graphics g = e.Graphics;

            if (canStart == true)
            {
                if (isStageClear == true)
                {
                    TargetAmount.Text = targetAmountNum.ToString();

                    // 캐릭터 이미지 삽입        
                    for (int i = 4; i >= 0; i--)
                    {
                        if(i == 0)
                        {
                            g.DrawImage(People[i].bitmap, (150 - (i * 30)) + peopleXY.X, (335 - (i * 35)) + peopleXY.Y);
                        }
                        else
                        {

                        g.DrawImage(People[i].bitmap, 150 - (i * 30), 335 - (i * 35));
                        }
                    }
                    //

                    // 현상수배범 이미지 띄우기
                    if (wanted != -1)
                    {
                        WantedPictureBox.Visible = true;
                        WantedPictureBox.Image = Characters[wanted].bitmap;
                    }
                    else
                    {
                        WantedPictureBox.Visible = false;
                    }
                }
            }
            else
            {

            }
            
        }
        private void setCharacters()
        {
            // gender : true 남 / false 여

            Characters[0] = new Person();
            Characters[0].bitmap = new Bitmap(Heal_Me.Properties.Resources.person01);
            Characters[0].gender[0] = true;
            Characters[0].hair[0] = false;
            Characters[0].hair[1] = false;
            Characters[0].hair[2] = true;
            Characters[0].hair[3] = false;
            Characters[0].eye[0] = false;
            Characters[0].eye[1] = true;
            Characters[0].ear[0] = true;
            Characters[0].mouth[0] = false;
            Characters[0].cloth[0] = false;
            Characters[0].cloth[1] = true;
            Characters[0].cloth[2] = false;

            Characters[1] = new Person();
            Characters[1].bitmap = new Bitmap(Heal_Me.Properties.Resources.person02);
            Characters[1].gender[0] = true;
            Characters[1].hair[0] = false;
            Characters[1].hair[1] = false;
            Characters[1].hair[2] = false;
            Characters[1].hair[3] = false;
            Characters[1].eye[0] = true;
            Characters[1].eye[1] = false;
            Characters[1].ear[0] = true;
            Characters[1].mouth[0] = false;
            Characters[1].cloth[0] = false;
            Characters[1].cloth[1] = false;
            Characters[1].cloth[2] = false;

            Characters[2] = new Person();
            Characters[2].bitmap = new Bitmap(Heal_Me.Properties.Resources.person03);
            Characters[2].gender[0] = true;
            Characters[2].hair[0] = false;
            Characters[2].hair[1] = false;
            Characters[2].hair[2] = false;
            Characters[2].hair[3] = false;
            Characters[2].eye[0] = false;
            Characters[2].eye[1] = true;
            Characters[2].ear[0] = true;
            Characters[2].mouth[0] = true;
            Characters[2].cloth[0] = false;
            Characters[2].cloth[1] = false;
            Characters[2].cloth[2] = true;

            Characters[3] = new Person();
            Characters[3].bitmap = new Bitmap(Heal_Me.Properties.Resources.person04);
            Characters[3].gender[0] = false;
            Characters[3].hair[0] = false;
            Characters[3].hair[1] = false;
            Characters[3].hair[2] = false;
            Characters[3].hair[3] = false;
            Characters[3].eye[0] = false;
            Characters[3].eye[1] = true;
            Characters[3].ear[0] = true;
            Characters[3].mouth[0] = false;
            Characters[3].cloth[0] = true;
            Characters[3].cloth[1] = false;
            Characters[3].cloth[2] = false;

            Characters[4] = new Person();
            Characters[4].bitmap = new Bitmap(Heal_Me.Properties.Resources.person05);
            Characters[4].gender[0] = true;
            Characters[4].hair[0] = false;
            Characters[4].hair[1] = false;
            Characters[4].hair[2] = false;
            Characters[4].hair[3] = true;
            Characters[4].eye[0] = false;
            Characters[4].eye[1] = true;
            Characters[4].ear[0] = true;
            Characters[4].mouth[0] = true;
            Characters[4].cloth[0] = false;
            Characters[4].cloth[1] = false;
            Characters[4].cloth[2] = true;

            Characters[5] = new Person();
            Characters[5].bitmap = new Bitmap(Heal_Me.Properties.Resources.person06);
            Characters[5].gender[0] = true;
            Characters[5].hair[0] = false;
            Characters[5].hair[1] = false;
            Characters[5].hair[2] = false;
            Characters[5].hair[3] = false;
            Characters[5].eye[0] = true;
            Characters[5].eye[1] = true;
            Characters[5].ear[0] = true;
            Characters[5].mouth[0] = false;
            Characters[5].cloth[0] = false;
            Characters[5].cloth[1] = false;
            Characters[5].cloth[2] = true;

            Characters[6] = new Person();
            Characters[6].bitmap = new Bitmap(Heal_Me.Properties.Resources.person07);
            Characters[6].gender[0] = false;
            Characters[6].hair[0] = false;
            Characters[6].hair[1] = false;
            Characters[6].hair[2] = true;
            Characters[6].hair[3] = false;
            Characters[6].eye[0] = false;
            Characters[6].eye[1] = true;
            Characters[6].ear[0] = false;
            Characters[6].mouth[0] = false;
            Characters[6].cloth[0] = true;
            Characters[6].cloth[1] = false;
            Characters[6].cloth[2] = false;

            Characters[7] = new Person();
            Characters[7].bitmap = new Bitmap(Heal_Me.Properties.Resources.person08);
            Characters[7].gender[0] = true;
            Characters[7].hair[0] = false;
            Characters[7].hair[1] = false;
            Characters[7].hair[2] = true;
            Characters[7].hair[3] = false;
            Characters[7].eye[0] = false;
            Characters[7].eye[1] = true;
            Characters[7].ear[0] = true;
            Characters[7].mouth[0] = false;
            Characters[7].cloth[0] = true;
            Characters[7].cloth[1] = false;
            Characters[7].cloth[2] = false;

            Characters[8] = new Person();
            Characters[8].bitmap = new Bitmap(Heal_Me.Properties.Resources.person09);
            Characters[8].gender[0] = false;
            Characters[8].hair[0] = false;
            Characters[8].hair[1] = false;
            Characters[8].hair[2] = true;
            Characters[8].hair[3] = false;
            Characters[8].eye[0] = false;
            Characters[8].eye[1] = true;
            Characters[8].ear[0] = false;
            Characters[8].mouth[0] = false;
            Characters[8].cloth[0] = false;
            Characters[8].cloth[1] = false;
            Characters[8].cloth[2] = false;

            Characters[9] = new Person();
            Characters[9].bitmap = new Bitmap(Heal_Me.Properties.Resources.person10);
            Characters[9].gender[0] = false;
            Characters[9].hair[0] = false;
            Characters[9].hair[1] = false;
            Characters[9].hair[2] = false;
            Characters[9].hair[3] = false;
            Characters[9].eye[0] = true;
            Characters[9].eye[1] = true;
            Characters[9].ear[0] = false;
            Characters[9].mouth[0] = false;
            Characters[9].cloth[0] = true;
            Characters[9].cloth[1] = false;
            Characters[9].cloth[2] = false;

            Characters[10] = new Person();
            Characters[10].bitmap = new Bitmap(Heal_Me.Properties.Resources.person11);
            Characters[10].gender[0] = false;
            Characters[10].hair[0] = true;
            Characters[10].hair[1] = false;
            Characters[10].hair[2] = false;
            Characters[10].hair[3] = false;
            Characters[10].eye[0] = false;
            Characters[10].eye[1] = true;
            Characters[10].ear[0] = true;
            Characters[10].mouth[0] = false;
            Characters[10].cloth[0] = false;
            Characters[10].cloth[1] = false;
            Characters[10].cloth[2] = false;

            Characters[11] = new Person();
            Characters[11].bitmap = new Bitmap(Heal_Me.Properties.Resources.person12);
            Characters[11].gender[0] = false;
            Characters[11].hair[0] = false;
            Characters[11].hair[1] = false;
            Characters[11].hair[2] = false;
            Characters[11].hair[3] = false;
            Characters[11].eye[0] = false;
            Characters[11].eye[1] = true;
            Characters[11].ear[0] = false;
            Characters[11].mouth[0] = false;
            Characters[11].cloth[0] = false;
            Characters[11].cloth[1] = false;
            Characters[11].cloth[2] = true;

            Characters[12] = new Person();
            Characters[12].bitmap = new Bitmap(Heal_Me.Properties.Resources.person13);
            Characters[12].gender[0] = false;
            Characters[12].hair[0] = false;
            Characters[12].hair[1] = false;
            Characters[12].hair[2] = false;
            Characters[12].hair[3] = false;
            Characters[12].eye[0] = false;
            Characters[12].eye[1] = true;
            Characters[12].ear[0] = true;
            Characters[12].mouth[0] = false;
            Characters[12].cloth[0] = true;
            Characters[12].cloth[1] = false;
            Characters[12].cloth[2] = false;

            Characters[13] = new Person();
            Characters[13].bitmap = new Bitmap(Heal_Me.Properties.Resources.person14);
            Characters[13].gender[0] = true;
            Characters[13].hair[0] = false;
            Characters[13].hair[1] = false;
            Characters[13].hair[2] = false;
            Characters[13].hair[3] = false;
            Characters[13].eye[0] = false;
            Characters[13].eye[1] = true;
            Characters[13].ear[0] = true;
            Characters[13].mouth[0] = true;
            Characters[13].cloth[0] = true;
            Characters[13].cloth[1] = false;
            Characters[13].cloth[2] = true;
            //13번(14) 의심

            Characters[14] = new Person();
            Characters[14].bitmap = new Bitmap(Heal_Me.Properties.Resources.person15);
            Characters[14].gender[0] = true;
            Characters[14].hair[0] = false;
            Characters[14].hair[1] = false;
            Characters[14].hair[2] = false;
            Characters[14].hair[3] = false;
            Characters[14].eye[0] = false;
            Characters[14].eye[1] = true;
            Characters[14].ear[0] = true;
            Characters[14].mouth[0] = false;
            Characters[14].cloth[0] = false;
            Characters[14].cloth[1] = false;
            Characters[14].cloth[2] = false;

            Characters[15] = new Person();
            Characters[15].bitmap = new Bitmap(Heal_Me.Properties.Resources.person16);
            Characters[15].gender[0] = false;
            Characters[15].hair[0] = false;
            Characters[15].hair[1] = true;
            Characters[15].hair[2] = false;
            Characters[15].hair[3] = false;
            Characters[15].eye[0] = true;
            Characters[15].eye[1] = true;
            Characters[15].ear[0] = true;
            Characters[15].mouth[0] = false;
            Characters[15].cloth[0] = false;
            Characters[15].cloth[1] = false;
            Characters[15].cloth[2] = false;

            Characters[16] = new Person();
            Characters[16].bitmap = new Bitmap(Heal_Me.Properties.Resources.person17);
            Characters[16].gender[0] = false;
            Characters[16].hair[0] = false;
            Characters[16].hair[1] = true;
            Characters[16].hair[2] = false;
            Characters[16].hair[3] = false;
            Characters[16].eye[0] = false;
            Characters[16].eye[1] = true;
            Characters[16].ear[0] = true;
            Characters[16].mouth[0] = false;
            Characters[16].cloth[0] = false;
            Characters[16].cloth[1] = false;
            Characters[16].cloth[2] = true;

            Characters[17] = new Person();
            Characters[17].bitmap = new Bitmap(Heal_Me.Properties.Resources.person18);
            Characters[17].gender[0] = true;
            Characters[17].hair[0] = false;
            Characters[17].hair[1] = false;
            Characters[17].hair[2] = false;
            Characters[17].hair[3] = false;
            Characters[17].eye[0] = false;
            Characters[17].eye[1] = true;
            Characters[17].ear[0] = true;
            Characters[17].mouth[0] = false;
            Characters[17].cloth[0] = false;
            Characters[17].cloth[1] = false;
            Characters[17].cloth[2] = true;

            Characters[18] = new Person();
            Characters[18].bitmap = new Bitmap(Heal_Me.Properties.Resources.person19);
            Characters[18].gender[0] = false;
            Characters[18].hair[0] = false;
            Characters[18].hair[1] = false;
            Characters[18].hair[2] = true;
            Characters[18].hair[3] = false;
            Characters[18].eye[0] = false;
            Characters[18].eye[1] = true;
            Characters[18].ear[0] = false;
            Characters[18].mouth[0] = false;
            Characters[18].cloth[0] = false;
            Characters[18].cloth[1] = false;
            Characters[18].cloth[2] = true;
            //18번(19) 민소매야

            Characters[19] = new Person();
            Characters[19].bitmap = new Bitmap(Heal_Me.Properties.Resources.person20);
            Characters[19].gender[0] = true;
            Characters[19].hair[0] = false;
            Characters[19].hair[1] = false;
            Characters[19].hair[2] = false;
            Characters[19].hair[3] = true;
            Characters[19].eye[0] = false;
            Characters[19].eye[1] = true;
            Characters[19].ear[0] = true;
            Characters[19].mouth[0] = true;
            Characters[19].cloth[0] = false;
            Characters[19].cloth[1] = true;
            Characters[19].cloth[2] = false;

            Characters[20] = new Person();
            Characters[20].bitmap = new Bitmap(Heal_Me.Properties.Resources.person21);
            Characters[20].gender[0] = true;
            Characters[20].hair[0] = false;
            Characters[20].hair[1] = false;
            Characters[20].hair[2] = true;
            Characters[20].hair[3] = false;
            Characters[20].eye[0] = false;
            Characters[20].eye[1] = true;
            Characters[20].ear[0] = true;
            Characters[20].mouth[0] = false;
            Characters[20].cloth[0] = false;
            Characters[20].cloth[1] = false;
            Characters[20].cloth[2] = true;

            Characters[21] = new Person();
            Characters[21].bitmap = new Bitmap(Heal_Me.Properties.Resources.person22);
            Characters[21].gender[0] = true;
            Characters[21].hair[0] = true;
            Characters[21].hair[1] = false;
            Characters[21].hair[2] = false;
            Characters[21].hair[3] = false;
            Characters[21].eye[0] = false;
            Characters[21].eye[1] = true;
            Characters[21].ear[0] = true;
            Characters[21].mouth[0] = false;
            Characters[21].cloth[0] = true;
            Characters[21].cloth[1] = false;
            Characters[21].cloth[2] = true;

            Characters[22] = new Person();
            Characters[22].bitmap = new Bitmap(Heal_Me.Properties.Resources.person23);
            Characters[22].gender[0] = true;
            Characters[22].hair[0] = false;
            Characters[22].hair[1] = true;
            Characters[22].hair[2] = false;
            Characters[22].hair[3] = false;
            Characters[22].eye[0] = false;
            Characters[22].eye[1] = true;
            Characters[22].ear[0] = true;
            Characters[22].mouth[0] = true;
            Characters[22].cloth[0] = true;
            Characters[22].cloth[1] = false;
            Characters[22].cloth[2] = false;

            Characters[23] = new Person();
            Characters[23].bitmap = new Bitmap(Heal_Me.Properties.Resources.person24);
            Characters[23].gender[0] = false;
            Characters[23].hair[0] = false;
            Characters[23].hair[1] = false;
            Characters[23].hair[2] = true;
            Characters[23].hair[3] = false;
            Characters[23].eye[0] = true;
            Characters[23].eye[1] = false;
            Characters[23].ear[0] = true;
            Characters[23].mouth[0] = false;
            Characters[23].cloth[0] = true;
            Characters[23].cloth[1] = false;
            Characters[23].cloth[2] = false;

            Characters[24] = new Person();
            Characters[24].bitmap = new Bitmap(Heal_Me.Properties.Resources.person25);
            Characters[24].gender[0] = false;
            Characters[24].hair[0] = false;
            Characters[24].hair[1] = false;
            Characters[24].hair[2] = true;
            Characters[24].hair[3] = false;
            Characters[24].eye[0] = false;
            Characters[24].eye[1] = true;
            Characters[24].ear[0] = false;
            Characters[24].mouth[0] = false;
            Characters[24].cloth[0] = false;
            Characters[24].cloth[1] = false;
            Characters[24].cloth[2] = true;

            Characters[25] = new Person();
            Characters[25].bitmap = new Bitmap(Heal_Me.Properties.Resources.person26);
            Characters[25].gender[0] = true;
            Characters[25].hair[0] = false;
            Characters[25].hair[1] = false;
            Characters[25].hair[2] = true;
            Characters[25].hair[3] = false;
            Characters[25].eye[0] = false;
            Characters[25].eye[1] = true;
            Characters[25].ear[0] = true;
            Characters[25].mouth[0] = false;
            Characters[25].cloth[0] = false;
            Characters[25].cloth[1] = false;
            Characters[25].cloth[2] = false;

            Characters[26] = new Person();
            Characters[26].bitmap = new Bitmap(Heal_Me.Properties.Resources.person27);
            Characters[26].gender[0] = true;
            Characters[26].hair[0] = true;
            Characters[26].hair[1] = false;
            Characters[26].hair[2] = false;
            Characters[26].hair[3] = false;
            Characters[26].eye[0] = false;
            Characters[26].eye[1] = true;
            Characters[26].ear[0] = true;
            Characters[26].mouth[0] = true;
            Characters[26].cloth[0] = false;
            Characters[26].cloth[1] = false;
            Characters[26].cloth[2] = true;

            Characters[27] = new Person();
            Characters[27].bitmap = new Bitmap(Heal_Me.Properties.Resources.person28);
            Characters[27].gender[0] = false;
            Characters[27].hair[0] = false;
            Characters[27].hair[1] = true;
            Characters[27].hair[2] = false;
            Characters[27].hair[3] = false;
            Characters[27].eye[0] = true;
            Characters[27].eye[1] = true;
            Characters[27].ear[0] = true;
            Characters[27].mouth[0] = false;
            Characters[27].cloth[0] = false;
            Characters[27].cloth[1] = false;
            Characters[27].cloth[2] = false;

            Characters[28] = new Person();
            Characters[28].bitmap = new Bitmap(Heal_Me.Properties.Resources.person29);
            Characters[28].gender[0] = true;
            Characters[28].hair[0] = false;
            Characters[28].hair[1] = false;
            Characters[28].hair[2] = false;
            Characters[28].hair[3] = false;
            Characters[28].eye[0] = true;
            Characters[28].eye[1] = false;
            Characters[28].ear[0] = true;
            Characters[28].mouth[0] = true;
            Characters[28].cloth[0] = false;
            Characters[28].cloth[1] = false;
            Characters[28].cloth[2] = false;

            Characters[29] = new Person();
            Characters[29].bitmap = new Bitmap(Heal_Me.Properties.Resources.person30);
            Characters[29].gender[0] = false;
            Characters[29].hair[0] = false;
            Characters[29].hair[1] = false;
            Characters[29].hair[2] = true;
            Characters[29].hair[3] = false;
            Characters[29].eye[0] = false;
            Characters[29].eye[1] = false;
            Characters[29].ear[0] = false;
            Characters[29].mouth[0] = false;
            Characters[29].cloth[0] = false;
            Characters[29].cloth[1] = false;
            Characters[29].cloth[2] = true;
            //30번 민소매야

            Characters[30] = new Person();
            Characters[30].bitmap = new Bitmap(Heal_Me.Properties.Resources.person31);
            Characters[30].gender[0] = false;
            Characters[30].hair[0] = false;
            Characters[30].hair[1] = false;
            Characters[30].hair[2] = false;
            Characters[30].hair[3] = false;
            Characters[30].eye[0] = false;
            Characters[30].eye[1] = true;
            Characters[30].ear[0] = false;
            Characters[30].mouth[0] = false;
            Characters[30].cloth[0] = false;
            Characters[30].cloth[1] = false;
            Characters[30].cloth[2] = false;

            Characters[31] = new Person();
            Characters[31].bitmap = new Bitmap(Heal_Me.Properties.Resources.person32);
            Characters[31].gender[0] = true;
            Characters[31].hair[0] = false;
            Characters[31].hair[1] = false;
            Characters[31].hair[2] = false;
            Characters[31].hair[3] = false;
            Characters[31].eye[0] = false;
            Characters[31].eye[1] = true;
            Characters[31].ear[0] = true;
            Characters[31].mouth[0] = true;
            Characters[31].cloth[0] = false;
            Characters[31].cloth[1] = false;
            Characters[31].cloth[2] = true;

            Characters[32] = new Person();
            Characters[32].bitmap = new Bitmap(Heal_Me.Properties.Resources.person33);
            Characters[32].gender[0] = true;
            Characters[32].hair[0] = false;
            Characters[32].hair[1] = false;
            Characters[32].hair[2] = false;
            Characters[32].hair[3] = false;
            Characters[32].eye[0] = true;
            Characters[32].eye[1] = true;
            Characters[32].ear[0] = true;
            Characters[32].mouth[0] = false;
            Characters[32].cloth[0] = false;
            Characters[32].cloth[1] = false;
            Characters[32].cloth[2] = true;

            Characters[33] = new Person();
            Characters[33].bitmap = new Bitmap(Heal_Me.Properties.Resources.person34);
            Characters[33].gender[0] = true;
            Characters[33].hair[0] = false;
            Characters[33].hair[1] = false;
            Characters[33].hair[2] = false;
            Characters[33].hair[3] = false;
            Characters[33].eye[0] = false;
            Characters[33].eye[1] = true;
            Characters[33].ear[0] = true;
            Characters[33].mouth[0] = true;
            Characters[33].cloth[0] = false;
            Characters[33].cloth[1] = false;
            Characters[33].cloth[2] = true;

            Characters[34] = new Person();
            Characters[34].bitmap = new Bitmap(Heal_Me.Properties.Resources.person35);
            Characters[34].gender[0] = true;
            Characters[34].hair[0] = false;
            Characters[34].hair[1] = false;
            Characters[34].hair[2] = false;
            Characters[34].hair[3] = false;
            Characters[34].eye[0] = false;
            Characters[34].eye[1] = true;
            Characters[34].ear[0] = true;
            Characters[34].mouth[0] = true;
            Characters[34].cloth[0] = false;
            Characters[34].cloth[1] = false;
            Characters[34].cloth[2] = true;

            Characters[35] = new Person();
            Characters[35].bitmap = new Bitmap(Heal_Me.Properties.Resources.person36);
            Characters[35].gender[0] = true;
            Characters[35].hair[0] = false;
            Characters[35].hair[1] = false;
            Characters[35].hair[2] = true;
            Characters[35].hair[3] = false;
            Characters[35].eye[0] = true;
            Characters[35].eye[1] = false;
            Characters[35].ear[0] = true;
            Characters[35].mouth[0] = false;
            Characters[35].cloth[0] = false;
            Characters[35].cloth[1] = false;
            Characters[35].cloth[2] = false;

            for(int i = 0; i<36; i++)
            {
                Characters[i].ID = i;
            }
        }
        private void setInitCondition()
        {

            condition_Fake_Type.gender[0] = 2;
            condition_Fake_Type.hair[0] = 2;
            condition_Fake_Type.hair[1] = 2;
            condition_Fake_Type.hair[2] = 2;
            condition_Fake_Type.hair[3] = 2;
            condition_Fake_Type.eye[0] = 2;
            condition_Fake_Type.eye[1] = 2;
            condition_Fake_Type.ear[0] = 2;
            condition_Fake_Type.mouth[0] = 2;
            condition_Fake_Type.cloth[0] = 2;
            condition_Fake_Type.cloth[1] = 2;
            condition_Fake_Type.cloth[2] = 2;

        }
            
            // 꾀병 추가 조건 설정
        private void setCondition_Fake_Add() 
        {
            // condition_Fake_Type

            Random rand = new Random();
            int num = 0;
            bool mustContinue = true;

            condition_Fake_Num++;

            while (mustContinue)
            {
                num = rand.Next(1, 7);

                switch (num)
                {
                    case 1:
                        // 성별
                        if (condition_Fake_Type.gender.Contains(2))
                        {
                            int n = rand.Next(0, 2);
                            switch (n)
                            {
                                case 0:
                                    condition_Fake_Type.gender[0] = 0;
                                    
                                    break;

                                case 1:
                                    condition_Fake_Type.gender[0] = 1;
                                    
                                    break;
                                default:
                                    break;
                            }
                            mustContinue = false;
                            

                        }
                        break;
                    case 2:
                        // 헤어
                        if(condition_Fake_Type.hair.Contains(2))
                        {
                            bool mustContinue2 = true;
                            while (mustContinue2)
                            {
                                int n = rand.Next(0, 4);
                                if(condition_Fake_Type.hair[n] == 2)
                                {
                                    int m = rand.Next(0, 2);
                                    switch (m)
                                    {
                                        case 0:
                                            condition_Fake_Type.hair[n] = 1;
                                            
                                            break;

                                        case 1:
                                            condition_Fake_Type.hair[n] = 1;
                                            
                                            break;
                                        default:
                                            break;
                                    }
                                    mustContinue2 = false;
                                   
                                }
                            }
                            mustContinue = false;
                            
                        }
                        
                        break;
                    case 3:
                        // 눈
                        if (condition_Fake_Type.eye.Contains(2))
                        {
                            bool mustContinue2 = true;
                            while (mustContinue2)
                            {
                                int n = rand.Next(0, 1);
                                if (condition_Fake_Type.eye[n] == 2)
                                {
                                    int m = rand.Next(0, 1);
                                    switch (m)
                                    {
                                        case 0:
                                            condition_Fake_Type.eye[n] = 1;
                                            
                                            break;

                                        case 1:
                                            condition_Fake_Type.eye[n] = 1;
                                            
                                            break;
                                        default:
                                            break;
                                    }
                                    mustContinue2 = false;
                                    
                                }
                            }
                            mustContinue = false;
                            
                        }

                            break;
                    case 4:
                        // 귀
                        //if (condition_Fake_Type.ear.Contains(2))
                        //{
                        //    int n = rand.Next(0, 2);
                        //    switch (n)
                        //    {
                        //        case 0:
                        //            condition_Fake_Type.ear[0] = 0;

                        //            break;

                        //        case 1:
                        //            condition_Fake_Type.ear[0] = 1;

                        //            break;
                        //        default:
                        //            break;
                        //    }
                        //    mustContinue = false;
                            
                        //}
                        break;
                    case 5:
                        // 입
                        if (condition_Fake_Type.mouth.Contains(2))
                        {
                            int n = rand.Next(0, 2);
                            switch (n)
                            {
                                case 0:
                                    condition_Fake_Type.mouth[0] = 1;
                                    break;

                                case 1:
                                    condition_Fake_Type.mouth[0] = 1;
                                    break;
                                default:
                                    break;
                            }
                            mustContinue = false;
                        }
                        break;
                    case 6:
                        // 옷
                        if (condition_Fake_Type.cloth.Contains(2))
                        {
                            bool mustContinue2 = true;
                            while (mustContinue2)
                            {
                                int n = rand.Next(0, 3);
                                if (condition_Fake_Type.cloth[n] == 2)
                                {
                                    int m = rand.Next(0, 2);
                                    switch (m)
                                    {
                                        case 0:
                                            condition_Fake_Type.cloth[n] = 1;
                                            break;

                                        case 1:
                                            condition_Fake_Type.cloth[n] = 1;
                                            break;
                                        default:
                                            break;
                                    }
                                    mustContinue2 = false;
                                }
                            }
                            mustContinue = false;
                        }
                        break;
                    default:

                        break;

                }
            }
        }
        private void setCondition_Fake_Del()
        {
            // condition_Fake_Type

            Random rand = new Random();
            int num = 0;
            bool mustContinue = true;

            condition_Fake_Num--;

            while (mustContinue)
            {
                num = rand.Next(1, 7);

                switch (num)
                {
                    case 1:
                        // 성별
                        if (condition_Fake_Type.gender.Contains(0) || condition_Fake_Type.gender.Contains(1))
                        {
                            int n = rand.Next(0, 2);
                            switch (n)
                            {
                                case 0:
                                    condition_Fake_Type.gender[0] = 2;

                                    break;

                                case 1:
                                    condition_Fake_Type.gender[0] = 2;

                                    break;
                                default:
                                    break;
                            }
                            mustContinue = false;


                        }
                        break;
                    case 2:
                        // 헤어
                        if (condition_Fake_Type.hair.Contains(0) || condition_Fake_Type.hair.Contains(1))
                        {
                            bool mustContinue2 = true;
                            while (mustContinue2)
                            {
                                int n = rand.Next(0, 4);
                                if (condition_Fake_Type.hair[n] == 0|| condition_Fake_Type.hair[n] == 1)
                                {
                                    condition_Fake_Type.hair[n] = 2;
                                    mustContinue2 = false;

                                }
                            }
                            mustContinue = false;

                        }

                        break;
                    case 3:
                        // 눈
                        if (condition_Fake_Type.eye.Contains(0)|| condition_Fake_Type.eye.Contains(1))
                        {
                            bool mustContinue2 = true;
                            while (mustContinue2)
                            {
                                int n = rand.Next(0, 2);
                                if (condition_Fake_Type.eye[n] == 0|| condition_Fake_Type.eye[n] == 1)
                                {
                                    condition_Fake_Type.eye[n] = 2;
                                    mustContinue2 = false;

                                }
                            }
                            mustContinue = false;

                        }

                        break;
                    case 4:
                        // 귀
                        if (condition_Fake_Type.ear.Contains(0)|| condition_Fake_Type.ear.Contains(1))
                        {
                            condition_Fake_Type.ear[0] = 2;
                            mustContinue = false;

                        }
                        break;
                    case 5:
                        // 입
                        if (condition_Fake_Type.mouth.Contains(0)|| condition_Fake_Type.mouth.Contains(1))
                        {
                            condition_Fake_Type.mouth[0] = 2;
                            mustContinue = false;
                        }
                        break;
                    case 6:
                        // 옷
                        if (condition_Fake_Type.cloth.Contains(0)|| condition_Fake_Type.cloth.Contains(1))
                        {
                            bool mustContinue2 = true;
                            while (mustContinue2)
                            {
                                int n = rand.Next(0, 3);
                                if (condition_Fake_Type.cloth[n] == 0|| condition_Fake_Type.cloth[n] == 1)
                                {
                                    condition_Fake_Type.cloth[n] = 2;
                                    mustContinue2 = false;
                                }
                            }
                            mustContinue = false;
                        }
                        break;
                    default:

                        break;

                }
            }
        }


        // 현상수배범 설정
        private void setWanted()
        {
            
            Random rand = new Random();
            wanted = rand.Next(0, 36);
           
        }
        private void setWanted_Del()
        {
            wanted = -1;
        }

        // 꾀병조건인지 현상수배범 조건인지 조건이 없는지 정하는 함수
        private void setCondition_Fail()
        {
            Random rand = new Random();
            int num = rand.Next(0, 3);
 
            if (life > 0 && life < 4)
            {
                life--;
            }
            if(condition_Fake_Num < 10)
            {
                setCondition_Fake_Add();
            }

            switch (num)
            {
                case 0:
                    
                    break;
                case 1:
                    setWanted();
                    break;
                default:
                    break;
            }
        }
        private void setCondition_Success()
        {
            Random rand = new Random();
            int num = rand.Next(0, 6);

            if (condition_Fake_Num <= 2)
            {
                num = 2;
            }

            switch (num)
            {
                case 1:
                    setCondition_Fake_Del();
                    break;
                default:
                    break;
            }
        }
        private void setWanted_Fail()
        {
            Random rand = new Random();
            int num = rand.Next(0, 2);

            if (life > 0 && life < 4)
            {
                life--;
            }
            if (time > 0)
            {
                GameTimeBar.Value -= 10;
            }
            if (condition_Fake_Num >= 10)
            {
                num = rand.Next(1, 2);
            }
            setWanted();
            switch (num)
            {
                case 0:
                    
                    setCondition_Fake_Add();
                    break;
                
                default:
                    break;
            }
        }
        private void setWanted_Success()
        {
            Random rand = new Random();
            int num = 0;

           

            if (time > 0)
            {
                GameTimeBar.Value += 10;
            }

           
            if (condition_Fake_Num <= 2)
            {
                num = rand.Next(1, 3);
            }

            setWanted();
            switch (num)
            {
                case 0:
                    setCondition_Fake_Del();
                    break;
                case 1:
                    if (life < 3) life++;
                    break;
                case 2:
                    
                    break;
                default:
                    break;
            }
        }
        // ----------

        // Ready Start화면 함수

        private void ReadyStart_Ani(int t)
        {


            if (t < 5)
            {
                tempT++;
                ReadyStrarLabel.Text = "R E A D Y";
                ReadyStrarLabel.Location = new Point((tempT * 85) - 300, 250);
            }
            else if (t > 5 && t < 7)
            {
                tempT--;
            }
            else if (t > 7 && t < 10)
            {
                tempT++;
                ReadyStrarLabel.Text = "R E A D Y";
                ReadyStrarLabel.Location = new Point((tempT * 85) - 300, 250);
            }
            else if (t > 10 && t < 18)
            {
                tempT++;
                ReadyStrarLabel.Text = "S T A R T";
                ReadyStrarLabel.Location = new Point((tempT * 85) - 1000, 250);
            }
            else if (t < 18 && t > 23)
            {
                tempT--;
            }
            else if (t > 22 && t < 28)
            {
                tempT++;
                ReadyStrarLabel.Text = "S T A R T";
                ReadyStrarLabel.Location = new Point((tempT * 85) - 1000, 250);
            }
            
        }

        //
        // InGame화면 함수
        private void setPeopleBitmap()
        {
            Random rand = new Random();
            
            for(int i = 0; i<5; i++)
            {
                int num = rand.Next(0, 36);
                
                People.Add(Characters[num]);
               
            }   
        }
        private void Memo_Label_Load()
        {
            //condition_Fake_Type
            /*
            *public int[] gender = new int[1];
           public int[] hair = new int[4];
           public int[] eye = new int[2];
           public int[] ear = new int[1];
           public int[] mouth = new int[1];
           public int[] cloth = new int[3];

            */

            string[] memo = new string[10];
            int num = 0;

            for (int n = 0; n < 6; n++)
            {
                switch (n)
                {
                    case 0:
                        for (int m = 0; m < 1; m++)
                        {
                            switch (m)
                            {
                                case 0:

                                    switch (condition_Fake_Type.gender[m])
                                    {
                                        case 0:
                                            memo[num] = "여자";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "남자";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                default:
                                    break;

                            }

                        }
                        break;

                    case 1:
                        for (int m = 0; m < 4; m++)
                        {
                            switch (m)
                            {
                                case 0:

                                    switch (condition_Fake_Type.hair[m])
                                    {
                                        case 0:
                                            memo[num] = "파마가 아님";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "파마";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                case 1:

                                    switch (condition_Fake_Type.hair[m])
                                    {
                                        case 0:
                                            memo[num] = "묶지 않은 머리";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "묶은 머리";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                case 2:

                                    switch (condition_Fake_Type.hair[m])
                                    {
                                        case 0:
                                            memo[num] = "금발이 아닌 머리";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "금발";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }

                                    break;
                                case 3:

                                    switch (condition_Fake_Type.hair[m])
                                    {
                                        case 0:
                                            memo[num] = "흰 머리가 아님";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "흰 머리";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                default:
                                    break;


                            }
                        }
                        break;
                    case 2:
                        for (int m = 0; m < 2; m++)
                        {
                            switch (m)
                            {
                                case 0:

                                    switch (condition_Fake_Type.eye[m])
                                    {
                                        case 0:
                                            memo[num] = "안경을 쓰지 않음";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "안경";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                case 1:

                                    switch (condition_Fake_Type.eye[m])
                                    {
                                        case 0:
                                            memo[num] = "보이지 않는 눈";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "보이는 눈";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                               
                                default:
                                    break;

                            }
                        }
                        break;
                    case 3:
                        for (int m = 0; m < 1; m++)
                        {
                            switch (m)
                            {
                                case 0:

                                    switch (condition_Fake_Type.ear[m])
                                    {
                                        case 0:
                                            memo[num] = "보이지 않는 귀";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "보이는 귀";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                
                                default:
                                    break;

                            }
                        }
                        break;
                    case 4:
                        for (int m = 0; m < 1; m++)
                        {
                            switch (m)
                            {
                                case 0:

                                    switch (condition_Fake_Type.mouth[m])
                                    {
                                        case 0:
                                            memo[num] = "수염이 나지 않음";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "수염";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;

                                default:
                                    break;

                            }
                        }
                        break;
                    case 5:
                        for (int m = 0; m < 3; m++)
                        {
                            switch (m)
                            {
                                case 0:

                                    switch (condition_Fake_Type.cloth[m])
                                    {
                                        case 0:
                                            memo[num] = "겉옷을 입지 않음";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "겉옷";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                case 1:

                                    switch (condition_Fake_Type.cloth[m])
                                    {
                                        case 0:
                                            memo[num] = "넥타이를 하지 않음";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "넥타이";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                case 2:

                                    switch (condition_Fake_Type.cloth[m])
                                    {
                                        case 0:
                                            memo[num] = "반팔이 아님";
                                            num++;
                                            break;
                                        case 1:
                                            memo[num] = "반팔";
                                            num++;
                                            break;
                                        default:
                                            break;
                                    }
                                    break;
                                default:
                                    break;

                            }
                        }
                        break;
                    default:
                        break;
                }
            }

            if (memo[0] != "") MemoLabel01.Text = memo[0];
            if (memo[1] != "") MemoLabel02.Text = memo[1];
            if (memo[2] != "") MemoLabel03.Text = memo[2];
            if (memo[3] != "") MemoLabel04.Text = memo[3];
            if (memo[4] != "") MemoLabel05.Text = memo[4];
            if (memo[5] != "") MemoLabel06.Text = memo[5];
            if (memo[6] != "") MemoLabel07.Text = memo[6];
            if (memo[7] != "") MemoLabel08.Text = memo[7];
            if (memo[8] != "") MemoLabel09.Text = memo[8];
            if (memo[9] != "") MemoLabel10.Text = memo[9];

        }
        
        private void delPerson()
        {
           
            Random rand = new Random();
            int num = rand.Next(0, 36);
            People.RemoveAt(0);

            
            People.Add(Characters[num]);

        }

        private void InGame_KeyDown(object sender, KeyEventArgs e)
        {
            
            switch (e.KeyCode)
            {
                case Keys.Left:
                    clickOutButton();
                    break;
                case Keys.Right:
                    clickInButton();
                    break;
                case Keys.Up:
                    clickPoliceButton();
                    break;
                case Keys.Down:
                    clickPoliceButton();
                    break;
                default:

                    break;
            }
            
            Invalidate();
        }


        private void OutButton_Click(object sender, EventArgs e)
        {
            if(canStart == true)
                clickOutButton();
        }
        private void InButton_Click(object sender, EventArgs e)
        {

            if(canStart == true)
                clickInButton();

        }
        private bool isEqual_bool_int(bool b, int i)
        {
            if (b == false && i == 0) return true;
            if (b == true && i == 1) return true;
            return false;
        }
        private void drawLife()
        {
            if(life >= 3)
            {
                Life01.Visible = true;
                Life02.Visible = true;
                Life03.Visible = true;

            }
            else if (life == 2)
            {
                Life01.Visible = true;
                Life02.Visible = true;
                Life03.Visible = false;

            }
            else if (life == 1)
            {
                Life01.Visible = true;
                Life02.Visible = false;
                Life03.Visible = false;

            }
            else
            {
                Life01.Visible = false;
                Life02.Visible = false;
                Life03.Visible = false;
                isStageClear = false;

                GameOver();
            }
        }

        private void PoliceButton_Click(object sender, EventArgs e)
        {
            if(canStart == true)
                clickPoliceButton();

        }

        private void clickOutButton()

        {

            Person p = People.First();
            bool isCondition_Success = false;

            if (isOut == false && isIn == false && isPolice == false)
            {
                isOut = true;

                if (wanted == p.ID)
                {
                    // 현상수배범 검거 실패
                    setWanted_Fail();
                    drawLife();
                    Memo_Label_Load();
                    

                }
                else
                {
                    if (condition_Fake_Type.gender.Contains(0) || condition_Fake_Type.gender.Contains(1))
                    {
                        if (isEqual_bool_int(p.gender[0], condition_Fake_Type.gender[0]))
                        {
                            isCondition_Success = true;
                        }

                    }
                    if (condition_Fake_Type.hair.Contains(0) || condition_Fake_Type.hair.Contains(1))
                    {
                        for (int i = 0; i < 4; i++)
                        {
                            if (condition_Fake_Type.hair[i] != 2)
                            {

                                if (isEqual_bool_int(p.hair[i], condition_Fake_Type.hair[i]))
                                {
                                    isCondition_Success = true;
                                }
                            }
                        }


                    }
                    if (condition_Fake_Type.eye.Contains(0) || condition_Fake_Type.eye.Contains(1))
                    {

                        for (int i = 0; i < 2; i++)
                        {
                            if (condition_Fake_Type.eye[i] != 2)
                            {
                                if (isEqual_bool_int(p.eye[i], condition_Fake_Type.eye[i]))
                                {
                                    isCondition_Success = true;
                                }
                            }
                        }


                    }
                    if (condition_Fake_Type.ear.Contains(0) || condition_Fake_Type.ear.Contains(1))
                    {
                        for (int i = 0; i < 1; i++)
                        {
                            if (condition_Fake_Type.ear[i] != 2)
                            {
                                if (isEqual_bool_int(p.ear[i], condition_Fake_Type.ear[i]))
                                {
                                    isCondition_Success = true;
                                }
                            }

                        }


                    }
                    if (condition_Fake_Type.mouth.Contains(0) || condition_Fake_Type.mouth.Contains(1))
                    {
                        for (int i = 0; i < 1; i++)
                        {
                            if (condition_Fake_Type.mouth[i] != 2)
                            {
                                if (isEqual_bool_int(p.mouth[i], condition_Fake_Type.mouth[i]))
                                {
                                    isCondition_Success = true;
                                }
                            }
                        }


                    }
                    if (condition_Fake_Type.cloth.Contains(0) || condition_Fake_Type.cloth.Contains(1))
                    {
                        for (int i = 0; i < 3; i++)
                        {
                            if (condition_Fake_Type.cloth[i] != 2)
                            {
                                if (isEqual_bool_int(p.cloth[i], condition_Fake_Type.cloth[i]))
                                {
                                    isCondition_Success = true;
                                }
                            }
                        }
                    }

                    // 조건 검사
                    if (isCondition_Success == true)
                    {
                        //Graphics g = null;
                        //g = this.CreateGraphics();

                        //setCondition_Success();
                        //Bitmap img = new Bitmap(Heal_Me.Properties.Resources.good);
                        //g.DrawImage(img, new Point(10, 350));

                        targetAmountNum++;
                        setCondition_Success();

                        Success_Fail_Label.Visible = true;
                        Success_Fail_Label.Text = "G O O D";
                        Success_Fail_Label.ForeColor = Color.Blue;

                    }
                    else
                    {
                        setCondition_Fail();
                        Success_Fail_Label.Visible = true;
                        Success_Fail_Label.Text = "B A D";
                        Success_Fail_Label.ForeColor = Color.Red;
                    }

                    drawLife();
                    Memo_Label_Load();


                }
                Invalidate();
            }
        }
        private void clickInButton()

        {


            //if (conditionType == 0 || conditionType == 1)
            //{
            Person p = People.First();
            bool isCondition_Success = true;

            if(isOut == false && isIn == false && isPolice == false)
            {
                isIn = true;
                if (wanted == p.ID)
                {
                    setWanted_Fail();
                    drawLife();
                    Memo_Label_Load();
                    
                }
                else
                {

                    if (condition_Fake_Type.gender.Contains(0) || condition_Fake_Type.gender.Contains(1))
                    {

                        if (isEqual_bool_int(p.gender[0], condition_Fake_Type.gender[0]))
                        {

                            isCondition_Success = false;

                        }

                    }
                    if (condition_Fake_Type.hair.Contains(0) || condition_Fake_Type.hair.Contains(1))
                    {
                        for (int i = 0; i < 4; i++)
                        {
                            if (condition_Fake_Type.hair[i] != 2)
                            {
                                if (isEqual_bool_int(p.hair[i], condition_Fake_Type.hair[i]))
                                {
                                    isCondition_Success = false;
                                }
                            }
                        }


                    }
                    if (condition_Fake_Type.eye.Contains(0) || condition_Fake_Type.eye.Contains(1))
                    {
                        for (int i = 0; i < 2; i++)

                        {
                            if (condition_Fake_Type.eye[i] != 2)
                            {
                                if (isEqual_bool_int(p.eye[i], condition_Fake_Type.eye[i]))
                                {
                                    isCondition_Success = false;
                                }
                            }
                        }


                    }
                    if (condition_Fake_Type.ear.Contains(0) || condition_Fake_Type.ear.Contains(1))
                    {
                        for (int i = 0; i < 1; i++)
                        {
                            if (condition_Fake_Type.ear[i] != 2)
                            {
                                if (isEqual_bool_int(p.ear[i], condition_Fake_Type.ear[i]))
                                {
                                    isCondition_Success = false;
                                }
                            }
                        }

                    }
                    if (condition_Fake_Type.mouth.Contains(0) || condition_Fake_Type.mouth.Contains(1))
                    {
                        for (int i = 0; i < 1; i++)
                        {
                            if (condition_Fake_Type.mouth[i] != 2)
                            {
                                if (isEqual_bool_int(p.mouth[i], condition_Fake_Type.mouth[i]))
                                {
                                    isCondition_Success = false;
                                }
                            }
                        }

                    }
                    if (condition_Fake_Type.cloth.Contains(0) || condition_Fake_Type.cloth.Contains(1))
                    {
                        for (int i = 0; i < 3; i++)
                        {
                            if (condition_Fake_Type.cloth[i] != 2)
                            {
                                if (isEqual_bool_int(p.cloth[i], condition_Fake_Type.cloth[i]))
                                {
                                    isCondition_Success = false;
                                }
                            }
                        }

                    }

                    if (isCondition_Success == true)
                    {
                        targetAmountNum++;
                        setCondition_Success();

                        Success_Fail_Label.Visible = true;
                        Success_Fail_Label.Text = "G O O D";
                        Success_Fail_Label.ForeColor = Color.Blue;
                    }
                    else
                    {
                        setCondition_Fail();
                        Success_Fail_Label.Visible = true;
                        Success_Fail_Label.Text = "B A D";
                        Success_Fail_Label.ForeColor = Color.Red;
                    }
                    drawLife();
                    Memo_Label_Load();

                }
            }
            
            Invalidate();

        }
        private void clickPoliceButton()

        {

            if (isIn == false && isOut == false && isPolice == false)
            {
                isPolice = true;

                Person p = People.First();
                if (p.ID == wanted)
                {
                    targetAmountNum++;
                    setWanted_Success();
                    Success_Fail_Label.Visible = true;
                    Success_Fail_Label.Text = "P E R F E C T";
                    Success_Fail_Label.ForeColor = Color.Blue;

                }
                else
                {
                    setWanted_Fail();
                    Success_Fail_Label.Visible = true;
                    Success_Fail_Label.Text = "W O R S T";
                    Success_Fail_Label.ForeColor = Color.Red;
                }

            }
            drawLife();
            Invalidate();
        }
        private void GameOver()
        {
            GameTimer.Enabled = false;
            AniTimer.Enabled = false;

            this.Hide();
            FailForm f = new Heal_Me.FailForm();
            f.ShowDialog();
            this.Close();
        }

        //----------------------------
    }

}