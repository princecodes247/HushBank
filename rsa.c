# include<stdio.h>
int main()
{	
int p,q,n,z,e,d,h=0,m,k,i,c[50];	
p=11;	
q=13;	
n=p*q;	
z=(p-1)*(q-1);	
e=11;	
d=11;	
char text[20],dec[20]	;	
printf("Enter the text to be encrypted\n");	
gets(text);	
for(i=0;text[i]!='\0';i++)	
{		
m=text[i];		
k=(m^e)%n;		
c[h++]=k;	
}	
for(i=0;i<h;i++)	
printf("%d",c[i]);	
for(i=0;i<h;i++)	
{		
m=c[i];		
k=(m^d)%n;	
dec[i]=k;	
}		
dec[i]='\0';	
printf("The decrypted text is %s",dec);
return 0;
}