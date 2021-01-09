#include <stdio.h>

#define ROW 19	// ��
#define COL 19	// ��

// �ٵ��� �׸���
// ��ǥ�� �Է¹޾� ���� ���´�
// �������� ���� ������ ���´�
// �ٵ��ǿ� ���� ���� ���� ������ ���� ������ ���

void printBoard(char *Omok[COL][ROW]);	// ������ �׸���
void insertXY(char *Omok[COL][ROW], int turn);	// ��ǥ �Է�
int isOvernum(int x, int y);	// ��ǥ �߸� �Է��ߴ���
int changeTurn(int turn);	// ������ ���� �� �ٲٱ�
void printAllDolNum();	// ��� �򵹰� �������� ���� ���
int isDol(char *Omok[COL][ROW], int x, int y);	// �̹� ������ �ִ���
void countCOLDolNum(char *Omok[COL][ROW], int num[COL][2]);	// ���� �� �˵� ����
void countROWDolNum(char *Omok[COL][ROW], int num[ROW][2]);	// ���� �� �˵� ����
void initBasic(char *Omok[COL][ROW]);	// ������� �������

// �ٵ��� ���� ���� ����
int AllDark = 0;
int AllWhite = 0;

int main() {
	char* Omok[COL][ROW] = {
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " },
		{ "�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� ","�� " }
	};
	int turn = 0;	// 0 : �� 1 : ������

	while (1) {
		initBasic(Omok);
		printBoard(Omok);
		printAllDolNum();
		insertXY(Omok, turn);

		turn = changeTurn(turn);
		system("cls");
	}
}

void printBoard(char *Omok[COL][ROW])	// ������ �׸���
{
	int COLnum[COL][2] = { NULL };
	int ROWnum[ROW][2] = { NULL };

	countCOLDolNum(Omok, COLnum);
	countROWDolNum(Omok, ROWnum);
	for (int i = 0; i < COL; i++) {
		if (i == 0) {
			for (int z = 0; z < ROW; z++) {
				printf("%d ", ROWnum[z][0]);
			}
			printf("\n");
			for (int z = 0; z < ROW; z++) {
				printf("%d ", ROWnum[z][1]);
			}
			printf("\n");
		}
		for (int j = 0; j < ROW; j++) {
			printf("%s", Omok[i][j]);
		}
		printf("%d %d", COLnum[i][0], COLnum[i][1]);
		printf("\n");
	}
}
void insertXY(char *Omok[COL][ROW], int turn)	// ��ǥ �Է�
{
	int x, y = 0;

	if (turn == 0) {
		while (1) {
			printf("���� �� �����Դϴ�.\n");
			printf("��ǥ �Է� : ");
			scanf("%d %d", &x, &y);

			if (isOvernum(x, y)) {
				printf("\n�߸� �Է� �ϼ̽��ϴ�.\n");
				continue;
			}
			if (isDol(Omok, x, y)) {
				printf("\n�̹� ������ �ֽ��ϴ�.\n");
				continue;
			}
			else {
				Omok[x][y] = "��";
				AllDark++;
				break;
			}

		}
	}
	else {
		while (1) {
			printf("�� �� �����Դϴ�.\n");
			printf("��ǥ �Է� : ");
			scanf("%d %d", &x, &y);

			if (isOvernum(x, y)) {
				printf("\n�߸� �Է� �ϼ̽��ϴ�.\n");
				continue;
			}
			if (isDol(Omok, x, y)) {
				printf("\n�̹� ������ �ֽ��ϴ�.\n");
				continue;
			}
			else {
				Omok[x][y] = "��";
				AllWhite++;
				break;
			}

		}
	}

}
int isOvernum(int x, int y)	// ��ǥ �߸� �Է��ߴ���
{
	if (x <0 || x>(COL - 1)) {
		return 1;	// ����
	}
	if (y <0 || y>(ROW - 1)) {
		return 1;	// ����
	}
	return 0;
}
int changeTurn(int turn)	// ������ ���� �� �ٲٱ�
{
	if (turn == 1) return 0;
	else if (turn == 0) return 1;
}
void printAllDolNum()	// ��� �򵹰� �������� ���� ���
{
	printf("\n");
	printf("���� �� ���� : %d\n", AllDark);
	printf("�� �� ���� : %d\n\n", AllWhite);
}
int isDol(char *Omok[COL][ROW], int x, int y)	// �̹� ������ �ִ���
{
	if (Omok[x][y] == "��" || Omok[x][y] == "��"
		|| Omok[x][y] == "��" || Omok[x][y] == "��") return 1;	// �������ִ�
	return 0;
}
void countCOLDolNum(char *Omok[COL][ROW], int num[COL][2])	// ���� �� �˵� ����
{
	int before = -1;	// ���� ���� -1 �� �ƹ��͵� ���� 0 �� ������ 1�� ��
	int B_continual = 0;
	int B_continualMax = 0;
	int B_index = 0;

	int W_continual = 0;
	int W_continualMax = 0;
	int W_index = 0;

	for (int i = 0; i < COL; i++) {
		for (int j = 0; j < ROW; j++) {
			if (Omok[i][j] == "��") {
				num[i][0]++;

				if (before != 0) {
					B_continual = 0;
				}
				B_continual++;

				if (B_continual > B_continualMax) {
					B_continualMax = B_continual;
					B_index = j - B_continualMax + 1;
				}
				
				before = 0;
			}
			else if (Omok[i][j] == "��"){
				num[i][1]++;

				if (before != 1) {
					W_continual = 0;
				}
				W_continual++;

				if (W_continual > W_continualMax) {
					W_continualMax = W_continual;
					W_index = j - W_continualMax + 1;
				}

				before = 1;
			}
			else {
				before = -1;
			}
		}
		if (B_continualMax > W_continualMax) {
			for (int z = 0; z < B_continualMax; z++) {
				Omok[i][B_index + z] = "��";
			}
		}
		else {
			for (int z = 0; z < W_continualMax; z++) {
				Omok[i][W_index + z] = "��";
			}

		}
		B_continual = 0;
		B_continualMax = 0;
		B_index = 0;

		W_continual = 0;
		W_continualMax = 0;
		W_index = 0;
	}
}
void countROWDolNum(char *Omok[COL][ROW], int num[ROW][2])	// ���� �� �˵� ����
{
	for (int i = 0; i < ROW; i++) {
		for (int j = 0; j < COL; j++) {
			if (Omok[j][i] == "��"|| Omok[j][i] == "��") num[i][0]++;
			else if (Omok[j][i] == "��"|| Omok[j][i] == "��") num[i][1]++;
		}
	}
}
void initBasic(char *Omok[COL][ROW])	// ������� �������
{
	for (int i = 0; i < COL; i++) {
		for (int j = 0; j < ROW; j++) {
			if (Omok[i][j] == "��") Omok[i][j] = "��";
			else if (Omok[i][j] == "��") Omok[i][j] = "��";
		}
	}
}