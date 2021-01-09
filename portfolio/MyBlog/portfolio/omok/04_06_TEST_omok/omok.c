#include <stdio.h>

#define ROW 19	// 열
#define COL 19	// 행

// 바둑판 그리기
// 좌표를 입력받아 돌을 놓는다
// 검은돌과 흰돌을 번갈아 놓는다
// 바둑판에 놓인 검은 돌의 갯수와 흰돌의 갯수를 출력

void printBoard(char *Omok[COL][ROW]);	// 오목판 그리기
void insertXY(char *Omok[COL][ROW], int turn);	// 좌표 입력
int isOvernum(int x, int y);	// 좌표 잘못 입력했는지
int changeTurn(int turn);	// 번갈아 놓는 턴 바꾸기
void printAllDolNum();	// 모든 흰돌과 검은돌의 갯수 출력
int isDol(char *Omok[COL][ROW], int x, int y);	// 이미 놓여져 있는지
void countCOLDolNum(char *Omok[COL][ROW], int num[COL][2]);	// 가로 흰돌 검돌 개수
void countROWDolNum(char *Omok[COL][ROW], int num[ROW][2]);	// 세로 흰돌 검돌 개수
void initBasic(char *Omok[COL][ROW]);	// 별모양을 원래대로

// 바둑판 위에 놓인 돌들
int AllDark = 0;
int AllWhite = 0;

int main() {
	char* Omok[COL][ROW] = {
		{ "┌ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┬ ","┐ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "├ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┼ ","┤ " },
		{ "└ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┴ ","┘ " }
	};
	int turn = 0;	// 0 : 흰돌 1 : 검은돌

	while (1) {
		initBasic(Omok);
		printBoard(Omok);
		printAllDolNum();
		insertXY(Omok, turn);

		turn = changeTurn(turn);
		system("cls");
	}
}

void printBoard(char *Omok[COL][ROW])	// 오목판 그리기
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
void insertXY(char *Omok[COL][ROW], int turn)	// 좌표 입력
{
	int x, y = 0;

	if (turn == 0) {
		while (1) {
			printf("검은 돌 차례입니다.\n");
			printf("좌표 입력 : ");
			scanf("%d %d", &x, &y);

			if (isOvernum(x, y)) {
				printf("\n잘못 입력 하셨습니다.\n");
				continue;
			}
			if (isDol(Omok, x, y)) {
				printf("\n이미 놓여져 있습니다.\n");
				continue;
			}
			else {
				Omok[x][y] = "○";
				AllDark++;
				break;
			}

		}
	}
	else {
		while (1) {
			printf("흰 돌 차례입니다.\n");
			printf("좌표 입력 : ");
			scanf("%d %d", &x, &y);

			if (isOvernum(x, y)) {
				printf("\n잘못 입력 하셨습니다.\n");
				continue;
			}
			if (isDol(Omok, x, y)) {
				printf("\n이미 놓여져 있습니다.\n");
				continue;
			}
			else {
				Omok[x][y] = "●";
				AllWhite++;
				break;
			}

		}
	}

}
int isOvernum(int x, int y)	// 좌표 잘못 입력했는지
{
	if (x <0 || x>(COL - 1)) {
		return 1;	// 오류
	}
	if (y <0 || y>(ROW - 1)) {
		return 1;	// 오류
	}
	return 0;
}
int changeTurn(int turn)	// 번갈아 놓는 턴 바꾸기
{
	if (turn == 1) return 0;
	else if (turn == 0) return 1;
}
void printAllDolNum()	// 모든 흰돌과 검은돌의 갯수 출력
{
	printf("\n");
	printf("검은 돌 갯수 : %d\n", AllDark);
	printf("흰 돌 갯수 : %d\n\n", AllWhite);
}
int isDol(char *Omok[COL][ROW], int x, int y)	// 이미 놓여져 있는지
{
	if (Omok[x][y] == "○" || Omok[x][y] == "●"
		|| Omok[x][y] == "☆" || Omok[x][y] == "★") return 1;	// 놓여져있다
	return 0;
}
void countCOLDolNum(char *Omok[COL][ROW], int num[COL][2])	// 가로 흰돌 검돌 개수
{
	int before = -1;	// 전에 것이 -1 은 아무것도 없음 0 은 검은돌 1은 흰돌
	int B_continual = 0;
	int B_continualMax = 0;
	int B_index = 0;

	int W_continual = 0;
	int W_continualMax = 0;
	int W_index = 0;

	for (int i = 0; i < COL; i++) {
		for (int j = 0; j < ROW; j++) {
			if (Omok[i][j] == "○") {
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
			else if (Omok[i][j] == "●"){
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
				Omok[i][B_index + z] = "☆";
			}
		}
		else {
			for (int z = 0; z < W_continualMax; z++) {
				Omok[i][W_index + z] = "★";
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
void countROWDolNum(char *Omok[COL][ROW], int num[ROW][2])	// 세로 흰돌 검돌 개수
{
	for (int i = 0; i < ROW; i++) {
		for (int j = 0; j < COL; j++) {
			if (Omok[j][i] == "○"|| Omok[j][i] == "☆") num[i][0]++;
			else if (Omok[j][i] == "●"|| Omok[j][i] == "★") num[i][1]++;
		}
	}
}
void initBasic(char *Omok[COL][ROW])	// 별모양을 원래대로
{
	for (int i = 0; i < COL; i++) {
		for (int j = 0; j < ROW; j++) {
			if (Omok[i][j] == "☆") Omok[i][j] = "○";
			else if (Omok[i][j] == "★") Omok[i][j] = "●";
		}
	}
}