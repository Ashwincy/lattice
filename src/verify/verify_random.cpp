#include <sstream>
#include <fstream>
#include <NTL/LLL.h>

NTL_CLIENT;

#include "tools.h"

long get_reference_dimension(long m, double c_1) {
 	long high = m;
 	long low = 0;
 	long cur;
 	long x;
 	
 	while (true) {
 		if (high == low) {
 			return low;
 		}
 		else if (high == low + 1)  {
 			return high;
 		}
 		else {
 			cur = low + (high - low) / 2;
 		}
 		x = (long)(c_1 * cur * log(cur));
 		if (x == m) {
 			return cur;
 		} else if (x < m) {
 			low = cur;
 		} else {
 			high = cur;
 		}
 	}
}

double get_c_1(long m, double c_2) {
	double left = 4 * c_2;
	double high = 2.0;
	double low = 0.0;
	double eps = 0.0001;
	double cur;
	
	for (cur = low; cur < high; cur += eps) {
		long n = get_reference_dimension(m, cur);
		double nbyLnn = n / log(n);
		double right = cur * log (nbyLnn / cur);
		if (left < right) {
			break;
		}
		
	}
	return cur;
}

int main(int argc,char** argv)
{
    long m = 80;
    long bit = 10;
    ZZ seed; seed = 0;
    vec_ZZ sol;

    PARSE_MAIN_ARGS {
        MATCH_MAIN_ARGID("--dim", m);
        MATCH_MAIN_ARGID("--seed", seed);
        MATCH_MAIN_ARGID("--solution", sol);
        SYNTAX();
    }

    // Check dimension
    if (sol.length() != m) {
        cerr << "impossible to read --sol  -  " << sol.length() << endl;
        abort();
    }
    // Check sol is nonzero
    if (IsZero(sol)) {
        cerr << "sol = 0 not allowed" << endl;
        abort();
    }

    // Computing challenge parameters
    double c_2 = 1.0;
	double c_1 = get_c_1(m, c_2);
	long n = get_reference_dimension(m, c_1);
	long q = (long)floor(pow(n, c_2));
    bool prng_normalized = false;
    if(n * m * (log2(q) + 1) <= 100000000) {
        prng_normalized = true;
    }

    //checking that sol is short
    if (sol*sol >= n*n) {
        cerr << "the vector is too long" << endl;
        abort();
    }

	// Preparing PRNG
    ifstream prng_source("PI_200M_mod2");
    long q_bitlen = (long)log2(q) + 1;

    // Building matrix A, such that x != 0 is solution iff Ax = 0 (mod q)
    mat_ZZ A;
	A.SetDims(m, n);
	for(long i = 0; i < m; i++) {
		for(long j = 0; j < n; j++) {
            ZZ rnd = to_ZZ(0);
            int rnd_bit;
            for (long k = 0; k < q_bitlen; k++) {
                // Retrieve the next bit
                if(prng_normalized) {
                    char in1, in2;
                    prng_source >> in1 >> in2;
                    rnd_bit = (in1 + in2) % 2;
                } else {
                    char in1;
                    prng_source >> in1;
                    rnd_bit = in1 % 2;
                }
                if (prng_source.eof()) {
                    cout << "randomness source depleted" << endl;
                    abort();
                }

                // Combine rnd_bit in rnd
                if (rnd_bit == 1) {
                    SetBit(rnd, k);
                }
            }
            A[i][j] = rnd % to_ZZ(q);
		}
	}
    prng_source.close();

    ZZ_p::init(to_ZZ(q));
    vec_ZZ_p syndrome = to_vec_ZZ_p(sol*A);

	// cout << "Determining constant c_2...\t";
	// cout << c_2 << endl;
	// cout << "Determining constant c_1...\t";
	// cout << c_1 << endl;
	// cout << "Finding reference dimension...\t";
	// cout << n << endl;
	// cout << "Calculating modulus...\t\t";
	// cout << q << endl;
	// cout << "Selecting PRNG normalized...\t";
	// cout << prng_normalized << endl;
    // cout << "A*sol" << endl << syndrome << endl;

    if (!IsZero(syndrome)) {
        cerr << "the vector is not in the lattice" << endl;
        abort();
    } else {
		cout << "the vector is in the lattice" << endl;
	}

}
